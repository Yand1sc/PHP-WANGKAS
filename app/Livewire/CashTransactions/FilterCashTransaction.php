<?php

namespace App\Livewire\CashTransactions;

use App\Models\CashTransaction;
use App\Repositories\CashTransactionRepository;
use App\Repositories\StudentRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

#[Title('Halaman Filter Transaksi SPP')]
class FilterCashTransaction extends Component
{
    use WithPagination;

    protected StudentRepository $studentRepository;
    protected CashTransactionRepository $cashTransactionRepository;

    /** FILTER BULAN (YYYY-MM) */
    public ?string $selected_month = null;

    /** Pencarian nama siswa */
    public ?string $query = '';

    /** Statistik */
    public array $statistics = [];

    public function boot(
        StudentRepository $studentRepository,
        CashTransactionRepository $cashTransactionRepository
    ): void {
        $this->studentRepository = $studentRepository;
        $this->cashTransactionRepository = $cashTransactionRepository;
    }

    public function mount(): void
    {
        $this->selected_month = date('Y-m'); // default bulan ini

        $this->statistics = [
            'totalCurrentMonth' => 0,
            'totalCurrentYear' => 0,
            'studentsNotPaidLimit' => collect(),
            'studentsNotPaid' => collect(),
            'studentsNotPaidCount' => 0,
        ];
    }

    /** Reset pagination saat filter berubah */
    public function updated(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        /** =====================================
         *  PARSE BULAN
         *  ===================================== */
        $month = $this->selected_month
            ? Carbon::createFromFormat('Y-m', $this->selected_month)
            : Carbon::now();

        $start = $month->copy()->startOfMonth()->toDateString();
        $end   = $month->copy()->endOfMonth()->toDateString();

        /** =====================================
         *  TOTAL PENDAPATAN PADA BULAN TERPILIH
         *  ===================================== */
        $sumAmountDateRange = CashTransaction::whereBetween('date_paid', [$start, $end])->sum('amount');

        /** =====================================
         *  FILTER DATA TRANSAKSI
         *  ===================================== */
        $filteredResult = CashTransaction::query()
            ->with('student', 'createdBy')
            ->when($this->query, function (Builder $query) {
                return $query->whereHas('student', function (Builder $studentQuery) {
                    return $studentQuery->where('name', 'like', "%{$this->query}%");
                });
            })
            ->whereBetween('date_paid', [$start, $end])
            ->orderBy('date_paid', 'desc');

        /** =====================================
         *  HITUNG SISWA YANG BELUM BAYAR BULAN INI
         *  ===================================== */
        $studentPaidStatus = $this->studentRepository->getStudentPaymentStatus($start, $end);

        $this->statistics['studentsNotPaid'] = $studentPaidStatus['studentsNotPaid'];
        $this->statistics['studentsNotPaidLimit'] = $studentPaidStatus['studentsNotPaid']->take(6);
        $this->statistics['studentsNotPaidCount'] = $studentPaidStatus['studentsNotPaid']->count();

        /** =====================================
         *  SUMMARIES (BULAN & TAHUN INI)
         *  ===================================== */
$cashTransactionSummaries = $this->cashTransactionRepository
    ->calculateTransactionSums($this->selected_month);

        $this->statistics['totalCurrentMonth'] = local_amount_format($cashTransactionSummaries['month']);
        $this->statistics['totalCurrentYear'] = local_amount_format($cashTransactionSummaries['year']);

        return view('livewire.cash-transactions.filter-cash-transaction', [
            'filteredResult' => $filteredResult->paginate(5),
            'sumAmountDateRange' => $sumAmountDateRange,
        ]);
    }
}
