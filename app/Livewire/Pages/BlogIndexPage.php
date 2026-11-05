<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use App\Models\PostCategory;
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
        $categories = PostCategory::all();

        $query = Post::with('category')->where('is_published', true);

        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        $posts = $query->orderByDesc('published_at')->paginate(9);

        return view('livewire.pages.blog-index-page', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}

