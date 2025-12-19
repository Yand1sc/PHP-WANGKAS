<?php

namespace App\Livewire\PaymentCategory;

use App\Models\PaymentCategory;
use Livewire\Component;

class PaymentCategoryCreate extends Component
{
    public $name;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();

        PaymentCategory::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->reset(['name', 'price']);
        $this->dispatch('category-created');
        $this->dispatch('success', message: 'Kategori berhasil ditambahkan.');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.payment-category.payment-category-create');
    }
}
