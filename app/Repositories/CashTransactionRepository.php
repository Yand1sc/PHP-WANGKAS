<?php

namespace App\Repositories;

use App\Models\CashTransaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class CashTransactionRepository
{
    public function __construct(
        private CashTransaction $model
    ) {}

    /**
     * Calculate the total sums of cash transactions for the given year.
     *
     * This method aggregates the amounts of cash transactions for the year,
     * month, week, and today.
     *
     * @param  int  $year  The year for which to calculate the sums.
     */
    public function calculateTransactionSums(?string $selectedMonth = null): \Illuminate\Support\Collection
{
    // Jika tidak pilih bulan → pakai bulan sekarang
    $month = $selectedMonth
        ? \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)
        : now();

    // Tentukan range tanggal bulan tersebut
    $startOfMonth = $month->copy()->startOfMonth()->toDateString();
    $endOfMonth   = $month->copy()->endOfMonth()->toDateString();

    // Tahun yang dipilih user
    $year = $month->year;

    return collect([
        'year'  => $this->model->whereYear('date_paid', $year)->sum('amount'),

        'month' => $this->model
            ->whereYear('date_paid', $year)
            ->whereMonth('date_paid', $month->month)
            ->sum('amount'),

        'week' => $this->model
            ->whereBetween('date_paid', [
                now()->startOfWeek()->toDateString(),
                now()->endOfWeek()->toDateString()
            ])
            ->sum('amount'),

        'today' => $this->model
            ->whereDate('date_paid', today())
            ->sum('amount'),
    ]);
}

    /**
     * Get total monthly transaction amounts for a given year.
     *
     * @param  int  $year  The year to retrieve data for.
     * @return Collection Collection with 'month' and 'amount' fields.
     */
    public function getMonthlyAmounts(int $year): Collection
    {
        return $this->model->selectRaw('EXTRACT(MONTH FROM date_paid) AS month, SUM(amount) AS amount')
            ->whereYear('date_paid', $year)
            ->groupBy('month')
            ->get();
    }

    /**
     * Get monthly transaction counts for a given year.
     *
     * @param  int  $year  The year to retrieve data for.
     * @return Collection Collection with 'month' and 'count' fields.
     */
    public function getMonthlyCounts(int $year): Collection
    {
        return $this->model->selectRaw('EXTRACT(MONTH FROM date_paid) AS month, COUNT(*) AS count')
            ->whereYear('date_paid', $year)
            ->groupBy('month')
            ->get();
    }
}
