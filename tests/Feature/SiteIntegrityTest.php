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
        $html = $this->get(route('gallery.index'))->assertOk()->getContent();
        $this->assertStringContainsString('project-detail-dialog', $html);
        $this->assertStringContainsString('closedby="any"', $html);
        $this->assertStringNotContainsString('Detail Dokumentasi', $html);

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

    public function test_resolved_storage_urls_are_root_relative_and_not_host_locked(): void
    {
        $heroUrl = (new \App\Models\HeroSlide(['image_path' => 'hero-slides/contoh.webp']))->image_url;
        $storageUrl = Product::resolvePublicImageUrl('products/custom.webp');

        $this->assertStringStartsWith('/storage/', $heroUrl);
        $this->assertStringStartsWith('/storage/', $storageUrl);
    }

    public function test_google_search_console_seo_requirements(): void
    {
        $pjuHtml = $this->get('/products?divisi=pju')->assertOk()->getContent();
        $meHtml = $this->get('/products?divisi=me')->assertOk()->getContent();

        $this->assertStringContainsString('<title>Katalog Penerangan Jalan Umum', $pjuHtml);
        $this->assertStringContainsString('<title>Katalog Mechanical &amp; Electrical', $meHtml);

        $searchHtml = $this->get('/products?divisi=pju&cari=solar')->assertOk()->getContent();
        $this->assertStringContainsString('<meta name="robots" content="noindex, follow">', $searchHtml);

        $product = Product::where('is_active', true)->firstOrFail();
        $productHtml = $this->get(route('products.show', $product->slug))->assertOk()->getContent();
        $this->assertStringContainsString('"@type":"Service"', $productHtml);
        $this->assertStringNotContainsString('"@type":"Offer"', $productHtml);

        $robots = $this->get('/robots.txt')->assertOk()->getContent();
        $this->assertStringContainsString('Allow: /livewire/livewire.min.js', $robots);
        $this->assertStringContainsString('Disallow: /livewire/update', $robots);

        $xmlString = $this->get('/sitemap.xml')->assertOk()->getContent();
        $this->assertNotFalse(@simplexml_load_string($xmlString));
        foreach (Gallery::take(3)->get() as $gallery) {
            $this->assertStringContainsString(htmlspecialchars($gallery->title, ENT_XML1), $xmlString);
        }
    }

    public function test_pages_do_not_contain_em_dash(): void
    {
        foreach (['/', '/about', '/products?divisi=me', '/gallery', '/blog', '/contact'] as $uri) {
            $this->assertStringNotContainsString('—', $this->get($uri)->getContent(), "Em dash ditemukan di {$uri}");
        }
    }

    public function test_me_division_highlights_building_electrical_maintenance_and_large_panels(): void
    {
        $migration = require database_path('migrations/2026_11_18_000001_update_me_building_electrical_and_large_panels_copy.php');
        $migration->up();

        foreach (['/', '/about', '/products?divisi=me'] as $uri) {
            $html = $this->get($uri)->assertOk()->getContent();
            $this->assertStringContainsString('LVMDP', $html, "Istilah panel besar LVMDP tidak ada di {$uri}");
            $this->assertStringContainsString('hotel', strtolower($html), "Cakupan hotel tidak ada di {$uri}");
            $this->assertStringContainsString('apartemen', strtolower($html), "Cakupan apartemen tidak ada di {$uri}");
            $this->assertStringContainsString('maintenance', strtolower($html), "Cakupan maintenance tidak ada di {$uri}");
        }

        $this->get('/products/fabrikasi-box-panel-wiring-plc-industri')
            ->assertOk()
            ->assertSee('LVMDP')
            ->assertSee('Kapasitas Besar');

        $this->get('/products/konstruksi-mep-ei-bas-tac')
            ->assertOk()
            ->assertSee('Hotel')
            ->assertSee('Apartemen')
            ->assertSee('Maintenance');
    }
}
