<?php

namespace App\Livewire\PaymentCategory;

use App\Models\PaymentCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]   // <-- WAJIB
class PaymentCategoryTable extends Component
{
    protected $listeners = [
        'category-created' => '$refresh',
        'category-updated' => '$refresh',
    ];

    public function delete($id)
    {
        PaymentCategory::findOrFail($id)->delete();
        $this->dispatch('success', message: 'Kategori berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.payment-category.payment-category-table', [
            'categories' => PaymentCategory::all()
        ]);
    }
}
