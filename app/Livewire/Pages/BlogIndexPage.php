<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Wawasan & Berita Perusahaan | PT. Multi Abadi Aksana')]
class BlogIndexPage extends Component
{
    use WithPagination;

    #[Url(as: 'kategori', except: 'semua')]
    public string $selectedCategory = 'semua';

    public function render()
    {
        $categories = \Illuminate\Support\Facades\Cache::remember(
            'post_categories_all',
            3600,
            fn () => PostCategory::orderBy('name')->get()
        );

        $query = Post::with('category')->where('is_published', true);

        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        $posts = $query->orderByDesc('published_at')->paginate(9);

        View::share([
            'metaDescription' => 'Wawasan teknis dan panduan pengadaan Penerangan Jalan Umum (PJU All In One, Two In One, Konvensional, PLN), fabrikasi Impeller industri, pemeliharaan panel MDP/SDP, dan standar K3 oleh PT. Multi Abadi Aksana.',
            'canonicalUrl' => route('blog.index'),
            'ogImage' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
        ]);

        return view('livewire.pages.blog-index-page', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}

