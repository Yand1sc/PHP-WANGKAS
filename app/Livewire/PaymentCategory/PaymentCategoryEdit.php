<?php

namespace App\Livewire\PaymentCategory;

use App\Models\PaymentCategory;
use Livewire\Component;

class PaymentCategoryEdit extends Component
{
    public $categoryId;
    public $name;
    public $price;

    protected $listeners = [
        'edit-category' => 'loadCategory'
    ];

public function loadCategory($id)
{
    $category = PaymentCategory::findOrFail($id);

    $this->categoryId = $category->id;
    $this->name       = $category->name;
    $this->price      = $category->price;
}


    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ];

    public function update()
    {
        $this->validate();

        PaymentCategory::findOrFail($this->categoryId)->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->dispatch('category-updated');
        $this->dispatch('success', message: 'Kategori berhasil diperbarui.');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.payment-category.payment-category-edit');
    }
}
