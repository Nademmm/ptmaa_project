<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteIntegrityTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_every_active_product_detail_page_renders(): void
    {
        foreach (Product::where('is_active', true)->get() as $product) {
            $this->get(route('products.show', $product->slug))
                ->assertOk()
                ->assertSee($product->name);
        }
    }

    public function test_every_division_and_category_filter_renders_with_products(): void
    {
        foreach (['pju', 'me'] as $division) {
            $this->get(route('products.index', ['divisi' => $division]))->assertOk();

            $categories = ProductCategory::forDivision($division)->where('is_active', true)->get();
            $this->assertGreaterThan(0, $categories->count(), "Divisi {$division} tidak punya kategori.");

            foreach ($categories as $category) {
                $this->assertGreaterThan(
                    0,
                    $category->products()->where('is_active', true)->count(),
                    "Kategori {$category->slug} kosong."
                );
                $this->get(route('products.index', ['divisi' => $division, 'kategori' => $category->slug]))->assertOk();
            }
        }
    }

    public function test_every_product_belongs_to_exactly_one_known_division(): void
    {
        foreach (Product::with('category.pillar')->get() as $product) {
            $this->assertContains($product->division, ['pju', 'me'], "Produk {$product->slug} divisi tidak dikenal.");
        }

        $this->assertGreaterThan(0, Product::whereHas('category', fn ($q) => $q->forDivision('me'))->count());
    }

    public function test_sitemap_lists_both_divisions_and_every_product_and_post(): void
    {
        $xml = $this->get('/sitemap.xml')->assertOk()->getContent();

        foreach (['pju', 'me'] as $division) {
            $this->assertStringContainsString('divisi='.$division, $xml);
        }
        foreach (Product::where('is_active', true)->get() as $product) {
            $this->assertStringContainsString(route('products.show', $product->slug), $xml);
        }
        foreach (Post::where('is_published', true)->get() as $post) {
            $this->assertStringContainsString(route('blog.show', $post->slug), $xml);
        }
    }

    public function test_gallery_filters_cover_all_divisions(): void
    {
        foreach (['semua', 'pju', 'mechanical_electrical'] as $category) {
            $this->get(route('gallery.index', ['kategori' => $category]))->assertOk();
        }

        foreach (['pju', 'mechanical_electrical'] as $category) {
            $this->assertGreaterThan(0, Gallery::where('category', $category)->count(), "Galeri {$category} kosong.");
        }
    }

    public function test_all_published_blog_posts_render(): void
    {
        foreach (Post::where('is_published', true)->get() as $post) {
            $this->get(route('blog.show', $post->slug))->assertOk()->assertSee($post->title);
        }
    }

    public function test_every_image_referenced_by_catalog_gallery_and_blog_exists_on_disk(): void
    {
        $paths = collect();

        foreach (Product::all() as $product) {
            $paths->push($product->thumbnail_image);
            foreach ((array) $product->gallery_images as $img) {
                $paths->push($img);
            }
        }
        foreach (Gallery::all() as $gallery) {
            $paths->push($gallery->image_path);
        }
        foreach (Post::all() as $post) {
            $paths->push($post->featured_image);
        }

        $missing = $paths
            ->filter()
            ->reject(fn ($p) => str_starts_with($p, 'http'))
            ->map(fn ($p) => ltrim($p, '/'))
            ->unique()
            ->reject(fn ($p) => file_exists(public_path($p)) || file_exists(public_path('storage/'.$p)))
            ->values()
            ->all();

        $this->assertSame([], $missing, 'Gambar hilang: '.implode(', ', $missing));
    }

    public function test_unknown_route_returns_custom_404_with_single_home_button(): void
    {
        $response = $this->get('/halaman-yang-tidak-ada-xyz')->assertNotFound();

        $this->assertSame(1, substr_count($response->getContent(), 'Kembali ke Beranda'));
    }

    public function test_pages_do_not_contain_em_dash(): void
    {
        foreach (['/', '/about', '/products?divisi=me', '/gallery', '/blog', '/contact'] as $uri) {
            $this->assertStringNotContainsString('—', $this->get($uri)->getContent(), "Em dash ditemukan di {$uri}");
        }
    }
}
