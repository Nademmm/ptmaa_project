<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use App\Models\HeroSlide;
use App\Models\Post;
use App\Models\Product;
use App\Models\ServicePillar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('PT. Multi Abadi Aksana | General Trading, Supplier & Contractor')]
class HomePage extends Component
{
    public function render()
    {
        $heroSlides = Cache::remember('hero_slides_active', 3600, function () {
            return HeroSlide::where('is_active', true)
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
        });

        if (empty($heroSlides)) {
            $heroSlides = [
                [
                    'image' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
                    'title' => 'Spesialis Penerangan Jalan Umum & Mechanical Electrical',
                    'desc' => 'Mitra strategis pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta rekayasa Mechanical & Electrical industri, termasuk Desain Interior & Exterior, di Indonesia.',
                ],
            ];
        }

        $pillars = Cache::remember('service_pillars_all', 3600, fn () => ServicePillar::with('scopes')->where('is_active', true)->orderBy('sort_order')->get());
        $featuredProducts = Cache::remember('featured_products', 3600, fn () => Product::with('category')->where('is_featured', true)->where('is_active', true)->orderBy('sort_order')->take(6)->get());
        $featuredGalleries = Cache::remember('gallery_projects_featured', 3600, fn () => Gallery::where('is_featured', true)->orderBy('sort_order')->take(4)->get());
        $latestPosts = Cache::remember('latest_posts_home', 3600, fn () => Post::with('category')->where('is_published', true)->orderByDesc('published_at')->take(3)->get());

        View::share([
            'metaDescription' => 'PT. Multi Abadi Aksana: Mitra strategis Pengadaan Barang, Konstruksi Penerangan Jalan Umum (PJU Tenaga Surya & PJU PLN), Rekayasa Mechanical & Electrical Industri (termasuk Desain Interior & Exterior) di Sidoarjo, Jawa Timur.',
            'canonicalUrl' => route('home'),
            'ogImage' => $heroSlides[0]['image'] ?? '/images/projects/pju-k3-gempol-sidoarjo.webp',
        ]);

        return view('livewire.pages.home-page', [
            'heroSlides' => $heroSlides,
            'pillars' => $pillars,
            'featuredProducts' => $featuredProducts,
            'featuredGalleries' => $featuredGalleries,
            'latestPosts' => $latestPosts,
        ]);
    }
}
