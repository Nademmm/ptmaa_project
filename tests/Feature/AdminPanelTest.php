<?php

namespace Tests\Feature;

use App\Filament\Pages\ManageCompanySettings;
use App\Filament\Resources\ContactInquiryResource\Pages\ListContactInquiries;
use App\Filament\Resources\GalleryResource\Pages\CreateGallery;
use App\Filament\Resources\GalleryResource\Pages\EditGallery;
use App\Filament\Resources\GalleryResource\Pages\ListGalleries;
use App\Filament\Resources\HeroSlideResource\Pages\ListHeroSlides;
use App\Filament\Resources\PostCategoryResource\Pages\ListPostCategories;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\ProductCategoryResource\Pages\CreateProductCategory;
use App\Filament\Resources\ProductCategoryResource\Pages\EditProductCategory;
use App\Filament\Resources\ProductCategoryResource\Pages\ListProductCategories;
use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ServicePillarResource\Pages\CreateServicePillar;
use App\Filament\Resources\ServicePillarResource\Pages\EditServicePillar;
use App\Filament\Resources\ServicePillarResource\Pages\ListServicePillars;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ServicePillar;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::where('email', 'admin.utama@ptmaa.co.id')->firstOrFail());
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_every_admin_list_page_renders(): void
    {
        foreach ([
            ListProducts::class,
            ListProductCategories::class,
            ListServicePillars::class,
            ListGalleries::class,
            ListPosts::class,
            ListPostCategories::class,
            ListHeroSlides::class,
            ListContactInquiries::class,
            ListUsers::class,
        ] as $page) {
            Livewire::test($page)->assertSuccessful();
        }

        Livewire::test(ManageCompanySettings::class)->assertSuccessful();
        $this->get(Filament::getPanel('admin')->getUrl())->assertOk();
    }

    public function test_only_two_business_divisions_exist_and_interior_exterior_is_under_me(): void
    {
        $this->assertSame(
            ['mechanical-electrical', 'penerangan-jalan-umum'],
            ServicePillar::orderBy('slug')->pluck('slug')->all()
        );

        foreach (['desain-pengerjaan-interior', 'arsitektur-konstruksi-exterior'] as $slug) {
            $category = ProductCategory::with('pillar')->where('slug', $slug)->firstOrFail();
            $this->assertSame('mechanical-electrical', $category->pillar->slug);
            $this->assertSame('me', $category->division);
        }

        $meScopes = ServicePillar::where('slug', 'mechanical-electrical')->firstOrFail()->scopes;
        $this->assertGreaterThanOrEqual(4, $meScopes->count());
        $this->assertTrue($meScopes->contains(fn ($s) => str_contains($s->title, 'Interior') || str_contains($s->title, 'Built-In')));
    }

    public function test_every_seeded_record_can_be_opened_in_its_edit_form(): void
    {
        foreach (Product::all() as $product) {
            Livewire::test(EditProduct::class, ['record' => $product->getKey()])
                ->assertSuccessful()
                ->assertFormSet(['name' => $product->name, 'slug' => $product->slug]);
        }

        foreach (ProductCategory::all() as $category) {
            Livewire::test(EditProductCategory::class, ['record' => $category->getKey()])->assertSuccessful();
        }

        foreach (ServicePillar::all() as $pillar) {
            Livewire::test(EditServicePillar::class, ['record' => $pillar->getKey()])->assertSuccessful();
        }

        foreach (Gallery::all() as $gallery) {
            Livewire::test(EditGallery::class, ['record' => $gallery->getKey()])->assertSuccessful();
        }

        foreach (Post::all() as $post) {
            Livewire::test(EditPost::class, ['record' => $post->getKey()])->assertSuccessful();
        }
    }

    public function test_admin_can_create_a_new_interior_product_under_me_and_it_appears_publicly(): void
    {
        $category = ProductCategory::where('slug', 'desain-pengerjaan-interior')->firstOrFail();

        Livewire::test(CreateProduct::class)
            ->fillForm([
                'product_category_id' => $category->getKey(),
                'name' => 'Pengerjaan Kitchen Set Custom Uji Admin',
                'slug' => 'pengerjaan-kitchen-set-custom-uji-admin',
                'short_summary' => 'Kitchen set custom plywood HPL.',
                'description' => '<p>Kitchen set custom dengan finishing HPL anti-gores.</p>',
                'is_active' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $product = Product::where('slug', 'pengerjaan-kitchen-set-custom-uji-admin')->firstOrFail();
        $this->assertSame('me', $product->division);
        $this->assertSame('Mechanical & Electrical', $product->division_name);

        $this->get(route('products.index', ['divisi' => 'me', 'kategori' => 'desain-pengerjaan-interior']))
            ->assertOk()
            ->assertSee('Pengerjaan Kitchen Set Custom Uji Admin');

        $this->get(route('products.show', $product->slug))->assertOk()->assertSee('anti-gores');

        $this->get('/sitemap.xml')->assertSee('pengerjaan-kitchen-set-custom-uji-admin');
    }

    public function test_admin_edit_of_a_product_is_reflected_publicly_without_stale_cache(): void
    {
        $product = Product::where('slug', 'furnish-interior-gordyn-wallpaper-kaca-film')->firstOrFail();

        $this->get(route('products.index', ['divisi' => 'me']))->assertSee($product->name);

        Livewire::test(EditProduct::class, ['record' => $product->getKey()])
            ->fillForm(['name' => 'Furnish Interior Edit Uji Admin'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->get(route('products.index', ['divisi' => 'me']))->assertSee('Furnish Interior Edit Uji Admin');
    }

    public function test_product_list_can_be_filtered_by_division(): void
    {
        $me = Product::whereHas('category', fn ($q) => $q->forDivision('me'))->get();
        $pju = Product::whereHas('category', fn ($q) => $q->forDivision('pju'))->get();

        $this->assertGreaterThan(0, $me->count());
        $this->assertGreaterThan(0, $pju->count());

        Livewire::test(ListProducts::class)
            ->filterTable('division', 'me')
            ->assertCanSeeTableRecords($me)
            ->assertCanNotSeeTableRecords($pju);
    }

    public function test_admin_can_create_new_category_under_me_and_product_under_it(): void
    {
        $me = ServicePillar::where('slug', 'mechanical-electrical')->firstOrFail();

        Livewire::test(CreateProductCategory::class)
            ->fillForm([
                'service_pillar_id' => $me->getKey(),
                'name' => 'Kategori Uji Interior Tambahan',
                'slug' => 'kategori-uji-interior-tambahan',
                'sort_order' => 9,
                'is_active' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $category = ProductCategory::where('slug', 'kategori-uji-interior-tambahan')->firstOrFail();
        $this->assertSame('me', $category->division);

        Livewire::test(CreateProduct::class)
            ->fillForm([
                'product_category_id' => $category->getKey(),
                'name' => 'Produk Uji Kategori Baru',
                'slug' => 'produk-uji-kategori-baru',
                'short_summary' => 'Ringkasan.',
                'description' => '<p>Deskripsi.</p>',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->get(route('products.index', ['divisi' => 'me', 'kategori' => 'kategori-uji-interior-tambahan']))
            ->assertOk()
            ->assertSee('Produk Uji Kategori Baru');
    }

    public function test_gallery_admin_uses_the_two_division_categories_only(): void
    {
        Livewire::test(CreateGallery::class)
            ->fillForm([
                'title' => 'Dokumentasi Interior Uji Admin',
                'slug' => 'dokumentasi-interior-uji-admin',
                'category' => 'mechanical_electrical',
                'location' => 'Sidoarjo',
                'completion_date' => '2026-03-01',
                'description' => 'Dokumentasi pengujian lapangan interior dan eksterior.',
                'image_path' => UploadedFile::fake()->image('project.webp'),
                'sort_order' => 20,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->get(route('gallery.index', ['kategori' => 'mechanical_electrical']))
            ->assertOk()
            ->assertSee('Dokumentasi Interior Uji Admin');

        Livewire::test(CreateGallery::class)
            ->fillForm([
                'title' => 'Divisi Tidak Valid',
                'slug' => 'divisi-tidak-valid',
                'category' => 'interior_exterior',
                'location' => 'Sidoarjo',
            ])
            ->call('create')
            ->assertHasFormErrors(['category']);
    }

    public function test_third_business_division_is_not_offered_anywhere_on_the_public_site(): void
    {
        foreach (['/', '/about', '/products?divisi=me', '/gallery', '/contact'] as $uri) {
            $html = $this->get($uri)->assertOk()->getContent();
            $this->assertStringNotContainsString('divisi=inout', $html, "Link divisi inout masih ada di {$uri}");
            $this->assertStringNotContainsString('Divisi 3', $html, "Teks Divisi 3 masih ada di {$uri}");
            $this->assertStringNotContainsString('3 Divisi', $html, "Teks 3 Divisi masih ada di {$uri}");
            $this->assertStringNotContainsString('3 Fokus Bisnis', $html, "Teks 3 Fokus Bisnis masih ada di {$uri}");
        }

        $this->get(route('products.index', ['divisi' => 'inout']))->assertOk()->assertSee('Penerangan Jalan Umum');
    }

    public function test_service_pillar_create_form_still_works_for_future_divisions(): void
    {
        Livewire::test(CreateServicePillar::class)->assertSuccessful();
    }
}
