<?php

namespace App\Livewire\Forms;

use App\Models\CashTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class UpdateCashTransactionForm extends Form
{
    use WithFileUploads;

    public ?CashTransaction $cashTransaction;

    #[Validate('required|exists:students,id')]
    public ?string $student_id;

    #[Validate('required|numeric|min:0')]
    public ?string $amount;

    #[Validate('required|date')]
    public ?string $date_paid;

    #[Validate('nullable|string|max:255')]
    public ?string $transaction_note;

    #[Validate('required|exists:payment_categories,id')]
    public $payment_category_id;

    #[Validate('nullable|file|mimes:jpg,jpeg,png,pdf|max:2048')]
    public $proof_file;

    public ?string $proof_file_path = null;


    /**
     * UPDATE DATA
     */
public function update(): void
{
    $this->validate();

    // jika upload baru
    if ($this->proof_file) {

        // normalisasi path lama: hapus prefix 'public/' jika ada
        if ($this->proof_file_path) {
            $oldPath = preg_replace('#^public/#', '', $this->proof_file_path);

            // hapus file lama di disk 'public' bila ada
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // simpan file ke disk 'public' dalam folder proofs
        $path = $this->proof_file->store('proofs', 'public');

        // debug log: pastikan file tersimpan
        Log::info('UpdateCashTransactionForm: stored proof_file', [
            'id' => $this->cashTransaction->id ?? null,
            'path' => $path,
            'exists_after_store' => Storage::disk('public')->exists($path),
        ]);

        // simpan path (contoh: proofs/xxxx.png)
        $this->proof_file_path = $path;
    }

    // update database
    $this->cashTransaction->update([
        'student_id'          => $this->student_id,
        'payment_category_id' => $this->payment_category_id,
        'amount'              => $this->amount,
        'date_paid'           => $this->date_paid,
        'transaction_note'    => $this->transaction_note,
        'proof_file'          => $this->proof_file_path,
        'created_by'          => Auth::id(),
    ]);
}


}
