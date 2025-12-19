<?php

namespace App\Livewire\Forms;

use App\Models\CashTransaction;
use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;   // <-- WAJIB

class StoreCashTransactionForm extends Form
{
    use WithFileUploads;
    #[Validate]
    public ?array $student_ids;

    public ?string $amount = null;
    public ?string $date_paid;

    public string $transaction_note = '';

    public $payment_category_id = null;   // kategori master
    public $proof_file;                   // file bukti

    /**
     * AUTO: set amount ketika kategori dipilih
     */
    public function updatedPaymentCategoryId($value)
    {
        if ($value) {
            $category = PaymentCategory::find($value);
            $this->amount = $category->price;  // <-- SET HARGA LANGSUNG
        }
    }

    /**
     * STORE data
     */
    public function store(): void
    {
        $this->validate();

        $proofPath = null;

        if ($this->proof_file) {
            $proofPath = $this->proof_file->store('proofs', 'public');
        }

        $now = now();

        $requests = collect($this->student_ids)->map(function ($studentID) use ($now, $proofPath) {
            return [
                'student_id'            => $studentID,
                'payment_category_id'   => $this->payment_category_id,
                'amount'                => $this->amount,
                'date_paid'             => $this->date_paid,
                'transaction_note'      => $this->transaction_note,
                'proof_file'            => $proofPath,
                'created_by'            => Auth::id(),
                'created_at'            => $now,
                'updated_at'            => $now,
            ];
        })->toArray();

        CashTransaction::insert($requests);

        $this->reset([
            'student_ids',
            'amount',
            'transaction_note',
            'payment_category_id',
            'proof_file',
        ]);
    }

    /**
     * VALIDATION
     */
    public function rules(): array
    {
        return [
            'student_ids'          => 'required|array',
            'payment_category_id'  => 'required|exists:payment_categories,id',
            'amount'               => 'required|numeric|min:0',
            'date_paid'            => 'required|date',
            'transaction_note'     => 'nullable|string|max:255',
            'proof_file'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'payment_category_id.required' => 'Kategori wajib dipilih!',
            'payment_category_id.exists'   => 'Kategori tidak valid!',
        ];
    }
}
