<?php

namespace App\Livewire\Components;

use App\Models\ProductCategory;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('sort_order')->take(6)->get();

        return view('livewire.components.footer', [
            'categories' => $categories,
        ]);
    }
}

