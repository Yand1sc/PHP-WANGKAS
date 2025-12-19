<?php

namespace App\Livewire\CashTransactions;

use App\Livewire\Forms\StoreCashTransactionForm;
use App\Models\PaymentCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;   // ⬅ WAJIB! Tambahkan ini

class CreateCashTransaction extends Component
{
    use WithFileUploads;   // ⬅ trait harus aktif

    public StoreCashTransactionForm $form;

    public Collection $students;

    /**
     * Initialize the component's state.
     */
    public function mount(): void
    {
        $this->form->date_paid = now()->toDateString();
    }

    /**
     * Update amount when category changes
     */
    public function updateAmount()
    {
        if ($this->form->payment_category_id) {
            $category = PaymentCategory::find($this->form->payment_category_id);

            if ($category) {
                $this->form->amount = $category->price;
            }
        } else {
            $this->form->amount = null;
        }
    }

    /**
     * Render the view.
     */
    public function render(): View
    {
        return view('livewire.cash-transactions.create-cash-transaction', [
            'students' => $this->students,
            'paymentCategories' => PaymentCategory::all(),
        ]);
    }

    /**
     * Save the form data and handle the related events.
     */
    public function save(): void
    {
        $this->form->store();

        $this->dispatch('close-modal');
        $this->dispatch('success', message: 'Data berhasil ditambahkan!');
        $this->dispatch('cash-transaction-created')->to(CashTransactionCurrentWeekTable::class);
    }
}
