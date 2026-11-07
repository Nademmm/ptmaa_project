<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use App\Models\HeroSlide;
use App\Models\Post;
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
        $heroSlides = HeroSlide::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (HeroSlide $slide) => [
                'image' => $slide->image_url,
                'title' => $slide->title,
                'desc' => $slide->subtitle,
            ])
            ->values()
            ->all();

        if (empty($heroSlides)) {
            $heroSlides = [
                [
                    'image' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
                    'title' => 'Spesialis Penerangan Jalan Umum & Mechanical Electrical',
                    'desc' => 'Mitra strategis pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta rekayasa Mechanical & Electrical industri di Indonesia.',
                ],
            ];
        }

        $pillars = ServicePillar::with('scopes')->where('is_active', true)->orderBy('sort_order')->get();
        $featuredProducts = Product::with('category')->where('is_featured', true)->where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $featuredGalleries = Gallery::where('is_featured', true)->orderBy('sort_order')->take(4)->get();
        $latestPosts = Post::with('category')->where('is_published', true)->orderByDesc('published_at')->take(3)->get();

        return view('livewire.pages.home-page', [
            'heroSlides' => $heroSlides,
            'pillars' => $pillars,
            'featuredProducts' => $featuredProducts,
            'featuredGalleries' => $featuredGalleries,
            'latestPosts' => $latestPosts,
        ]);
    }
}
