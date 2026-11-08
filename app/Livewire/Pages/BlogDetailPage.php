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

        $seoTitle = !empty($post->meta_title)
            ? $post->meta_title
            : "{$post->title} | PT. Multi Abadi Aksana";

        $seoDesc = !empty($post->meta_description)
            ? $post->meta_description
            : \Illuminate\Support\Str::limit(trim(strip_tags((string) ($post->excerpt ?: $post->content))), 160);

        return view('livewire.pages.blog-detail-page', [
            'post' => $post,
            'recentPosts' => $recentPosts,
        ])->layoutData([
            'title' => $seoTitle,
            'metaDescription' => $seoDesc,
            'metaKeywords' => implode(', ', array_filter([$post->title, $post->category?->name, 'PT Multi Abadi Aksana', 'Artikel Teknis PJU & ME'])),
            'canonicalUrl' => route('blog.show', $post->slug),
            'ogType' => 'article',
            'ogImage' => $post->featured_image_url,
        ]);
    }
}

