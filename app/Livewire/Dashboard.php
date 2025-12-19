<?php

namespace App\Livewire;

use App\Models\CashTransaction;
use App\Models\SchoolClass;
use App\Models\SchoolMajor;
use App\Models\Student;
use App\Models\User;
use App\Repositories\CashTransactionRepository;
use App\Repositories\StudentRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

#[Title('Dashboard')]
class Dashboard extends Component
{
    protected CashTransactionRepository $cashTransactionRepository;
    protected StudentRepository $studentRepository;

    public string $year;

    private array $months = [
        'jan', 'feb', 'mar', 'apr', 'mei', 'jun',
        'jul', 'agu', 'sep', 'okt', 'nov', 'des'
    ];

    /**
     * Boot the component.
     */
    public function boot(
        CashTransactionRepository $cashTransactionRepository,
        StudentRepository $studentRepository,
    ): void {
        $this->cashTransactionRepository = $cashTransactionRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Initialize the component's state.
     */
    public function mount(): void
    {
        $this->year = now()->year;

        $cashTransactionAmount = $this->cashTransactionRepository->getMonthlyAmounts($this->year);
        $cashTransactionCount  = $this->cashTransactionRepository->getMonthlyCounts($this->year);

        $this->dispatch(
            'dashboard-chart-loaded',
            amount: $this->fillMissingMonthsCounts($cashTransactionAmount->pluck('amount', 'month')),
            count: $this->fillMissingMonthsCounts($cashTransactionCount->pluck('count', 'month'))
        );
    }

    /**
     * Render the view.
     */
    public function render(): View
    {
        /**
         * ==================================================
         * DATA DASAR
         * ==================================================
         */
        $studentWithMajors = SchoolMajor::select('name', 'abbreviation')
            ->withCount('students')
            ->get();

        $studentGenders = $this->studentRepository->countStudentGender();

        /**
         * ==================================================
         * 🔥 STATUS SPP BULAN INI (PAKAI LOGIC FILTER)
         * ==================================================
         */
        $now = Carbon::now();
        $start = $now->copy()->startOfMonth()->toDateString();
        $end   = $now->copy()->endOfMonth()->toDateString();

        $paymentStatus = $this->studentRepository
            ->getStudentPaymentStatus($start, $end);

        $paidSPP   = $paymentStatus['studentsPaid']->count();
        $unpaidSPP = $paymentStatus['studentsNotPaid']->count();

        /**
         * ==================================================
         * LINE CHART PER TAHUN
         * ==================================================
         */
        $cashTransactionAmountPerYear = CashTransaction::selectRaw(
            'EXTRACT(YEAR FROM date_paid) AS year, SUM(amount) AS amount'
        )
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $cashTransactionCountPerYear = CashTransaction::selectRaw(
            'EXTRACT(YEAR FROM date_paid) AS year, COUNT(*) AS count'
        )
            ->groupBy('year')
            ->get();

        /**
         * ==================================================
         * PIE CHART TRANSAKSI BERDASARKAN JENIS KELAMIN
         * ==================================================
         */
        $cashTransactionCountByGender = CashTransaction::leftJoin(
                'students',
                'cash_transactions.student_id',
                '=',
                'students.id'
            )
            ->selectRaw('students.gender AS gender, COUNT(*) AS total_paid')
            ->groupBy('gender')
            ->get();

        /**
         * ==================================================
         * CHARTS ARRAY
         * ==================================================
         */
        $charts = [
            'counter' => [
                'student'       => Student::count(),
                'schoolClass'   => SchoolClass::count(),
                'schoolMajor'   => SchoolMajor::count(),
                'administrator' => User::count(),
            ],

            'pieChart' => [
                'studentGender' => [
                    'series' => [
                        $studentGenders['male'],
                        $studentGenders['female'],
                    ],
                    'labels' => ['Laki-laki', 'Perempuan'],
                ],

                'studentMajor' => [
                    'series' => $studentWithMajors->pluck('students_count'),
                    'labels' => $studentWithMajors->map(function ($major) {
                        return "{$major->name} ({$major->abbreviation})";
                    }),
                ],

                'cashTransactionCountByGender' => [
                    'series' => $cashTransactionCountByGender->pluck('total_paid'),
                    'labels' => ['Laki-laki', 'Perempuan'],
                ],

                /**
                 * 🔥 PIE CHART STATUS SPP (BULAN INI)
                 * SUMBER DATA = StudentRepository
                 */
                'studentSPPStatus' => [
                    'series' => [$paidSPP, $unpaidSPP],
                    'labels' => [
                        'Sudah Bayar SPP (Bulan Ini)',
                        'Belum Bayar SPP (Bulan Ini)',
                    ],
                ],
            ],

            'lineChart' => [
                'cashTransactionAmountPerYear' => [
                    'series'     => $cashTransactionAmountPerYear->pluck('amount'),
                    'categories' => $cashTransactionAmountPerYear->pluck('year'),
                ],
                'cashTransactionCountPerYear' => [
                    'series'     => $cashTransactionCountPerYear->pluck('count'),
                    'categories' => $cashTransactionCountPerYear->pluck('year'),
                ],
            ],
        ];

        return view('livewire.dashboard', compact('charts'));
    }

    /**
     * Fill in missing counts for each month.
     */
    private function fillMissingMonthsCounts(Collection $collection): array
    {
        $statistics = [];

        for ($i = 1; $i <= 12; $i++) {
            $statistics[$this->months[$i - 1]] = $collection[$i] ?? 0;
        }

        return $statistics;
    }
}
