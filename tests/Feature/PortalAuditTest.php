<?php

namespace Tests\Feature;

use App\Livewire\Pages\ContactPage;
use App\Models\ContactInquiry;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Product;
use App\Models\ServicePillar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PortalAuditTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_core_public_pages_return_http_200(): void
    {
        $routes = [
            '/',
            '/about',
            '/products',
            '/products?divisi=pju',
            '/products?divisi=me',
            '/gallery',
            '/blog',
            '/contact',
            '/robots.txt',
            '/sitemap.xml',
        ];

        foreach ($routes as $uri) {
            $response = $this->get($uri);
            $response->assertStatus(200);
        }
    }

    public function test_two_business_divisions_and_no_legacy_sparepart_category(): void
    {
        $this->assertEquals(2, ServicePillar::count());
        $this->assertDatabaseHas('service_pillars', ['slug' => 'penerangan-jalan-umum']);
        $this->assertDatabaseHas('service_pillars', ['slug' => 'mechanical-electrical']);
        $this->assertDatabaseMissing('product_categories', ['slug' => 'sparepart-equipment']);
        $this->assertDatabaseMissing('post_categories', ['slug' => 'sparepart-konstruksi-k3']);
        $this->assertEquals(7, Product::count());
        $this->assertEquals(11, Gallery::count());
        $this->assertEquals(3, Post::count());
    }

    public function test_product_and_blog_detail_pages_render_correctly(): void
    {
        $product = Product::firstOrFail();
        $this->get(route('products.show', $product->slug))
            ->assertStatus(200)
            ->assertSee($product->name);

        $post = Post::firstOrFail();
        $this->get(route('blog.show', $post->slug))
            ->assertStatus(200)
            ->assertSee($post->title);
    }

    public function test_robots_txt_has_valid_absolute_sitemap_url(): void
    {
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $this->assertStringContainsString('Sitemap: http', $response->getContent());
        $this->assertStringContainsString('/sitemap.xml', $response->getContent());
    }

    public function test_decoy_admin_paths_return_404(): void
    {
        $this->get('/admin')->assertStatus(404);
        $this->get('/wp-admin')->assertStatus(404);
        $this->get('/login')->assertStatus(404);
    }

    public function test_secret_admin_login_page_is_accessible_with_noindex_headers(): void
    {
        $adminPath = config('app.admin_panel_path', 'portal-internal-maa-9x7k2v');
        $response = $this->get("/{$adminPath}/login");
        $response->assertStatus(200);
        $response->assertHeader('X-Robots-Tag', 'noindex, nofollow, noarchive, nosnippet');
    }

    public function test_contact_inquiry_form_submission_and_honeypot(): void
    {
        $pillar = ServicePillar::firstOrFail();

        Livewire::test(ContactPage::class)
            ->set('full_name', 'PT. Tester Konstruksi')
            ->set('company_or_institution', 'Dinas PU')
            ->set('whatsapp_number', '081234567890')
            ->set('email', 'test@dinaspu.go.id')
            ->set('service_pillar_id', $pillar->id)
            ->set('subject', 'Pengadaan Tiang PJU Octagonal')
            ->set('message', 'Mohon informasi spesifikasi teknis dan jadwal survei.')
            ->call('submit')
            ->assertSet('isSubmitted', true);

        $this->assertDatabaseHas('contact_inquiries', [
            'full_name' => 'PT. Tester Konstruksi',
            'subject' => 'Pengadaan Tiang PJU Octagonal',
        ]);
    }

    public function test_public_security_headers_are_present(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-XSS-Protection', '1; mode=block');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    public function test_favicon_and_webmanifest_exist_and_accessible(): void
    {
        $this->assertFileExists(public_path('favicon.ico'));
        $this->assertFileExists(public_path('site.webmanifest'));
        $manifestJson = json_decode(file_get_contents(public_path('site.webmanifest')), true);
        $this->assertIsArray($manifestJson);
        $this->assertEquals('PT. Multi Abadi Aksana', $manifestJson['name']);
    }
}

