<?php

namespace App\Livewire\CashTransactions;

use App\Livewire\Forms\UpdateCashTransactionForm;
use App\Models\CashTransaction;
use App\Models\PaymentCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCashTransaction extends Component
{
    use WithFileUploads; // WAJIB UNTUK UPLOAD

    public UpdateCashTransactionForm $form;
    public Collection $students;

    public function render(): View
    {
        return view('livewire.cash-transactions.edit-cash-transaction', [
            'students'            => $this->students,
            'paymentCategories'   => PaymentCategory::all(),
            'existing_proof_file' => $this->form->proof_file_path ?? null
        ]);
    }

    #[On('cash-transaction-edit')]
public function setValue(CashTransaction $cashTransaction): void
{
    $this->form->cashTransaction = $cashTransaction;

    // Autofill semua field
    $this->form->student_id = $cashTransaction->student_id;
    $this->form->payment_category_id = $cashTransaction->payment_category_id;
    $this->form->amount = $cashTransaction->amount;
    $this->form->date_paid = $cashTransaction->date_paid;
    $this->form->transaction_note = $cashTransaction->transaction_note;

    // simpan bukti lama
    $this->form->proof_file_path = $cashTransaction->proof_file;

    // reset upload agar livewire tidak ganggu file lama
    $this->form->proof_file = null;
}



    public function edit(): void
    {
        $this->form->update();

        $this->dispatch('close-modal');
        $this->dispatch('success', message: 'Data berhasil diubah!');
        $this->dispatch('cash-transaction-updated')
            ->to(CashTransactionCurrentWeekTable::class);
    }
}
