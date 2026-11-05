<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class BlogDetailPage extends Component
{
    public string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $post = Post::with('category')->where('slug', $this->slug)->where('is_published', true)->firstOrFail();

        $recentPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->orderByDesc('published_at')->take(4)->get();

        return view('livewire.pages.blog-detail-page', [
            'post' => $post,
            'recentPosts' => $recentPosts,
        ])->title("{$post->title} | PT. Multi Abadi Aksana");
    }
}

