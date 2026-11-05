<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\ServicePillar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('PT. Multi Abadi Aksana | General Trading, Supplier & Contractor')]
class HomePage extends Component
{
    public function render()
    {
        $pillars = ServicePillar::with('scopes')->where('is_active', true)->orderBy('sort_order')->get();
        $featuredProducts = Product::with('category')->where('is_featured', true)->where('is_active', true)->take(6)->get();
        $featuredGalleries = Gallery::where('is_featured', true)->orderBy('sort_order')->take(4)->get();

        return view('livewire.pages.home-page', [
            'pillars' => $pillars,
            'featuredProducts' => $featuredProducts,
            'featuredGalleries' => $featuredGalleries,
        ]);
    }
}

