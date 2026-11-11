<?php

use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\BlogDetailPage;
use App\Livewire\Pages\BlogIndexPage;
use App\Livewire\Pages\ContactPage;
use App\Livewire\Pages\GalleryPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ProductCatalogPage;
use App\Livewire\Pages\ProductDetailPage;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

// Beranda & Profil Korporat
Route::get('/', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');

// Katalog & Detail Produk (Non-Ecommerce Showcase)
Route::get('/products', ProductCatalogPage::class)->name('products.index');
Route::get('/products/{slug}', ProductDetailPage::class)->name('products.show');

// Galeri Dokumentasi "Projek On Duty"
Route::get('/gallery', GalleryPage::class)->name('gallery.index');

// Wawasan & Berita Edukatif (Blog)
Route::get('/blog', BlogIndexPage::class)->name('blog.index');
Route::get('/blog/{slug}', BlogDetailPage::class)->name('blog.show');

// Kontak, Konsultasi, & Permintaan Survei Lapangan
Route::get('/contact', ContactPage::class)->name('contact');

// Dynamic robots.txt with valid absolute Sitemap URL (Lighthouse & RFC 9309 Compliant)
Route::get('/robots.txt', function () {
    $sitemapUrl = url('/sitemap.xml');
    $content = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Disallow: /livewire/',
        'Disallow: /portal-internal-maa-9x7k2v/',
        '',
        "Sitemap: {$sitemapUrl}",
        '',
    ]);

    return response($content, 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
        'X-Robots-Tag' => 'all',
    ]);
})->name('robots');

// Dynamic XML Sitemap + Image Sitemap (Google Search Console Standard)
Route::get('/sitemap.xml', function () {
    $sitemapVersion = (int) Cache::get('seo_sitemap_version', 1);
    $cacheKey = 'seo_sitemap_xml_v'.$sitemapVersion.'_'.md5(request()->getSchemeAndHttpHost());
    $xml = Cache::remember($cacheKey, 3600, function (): string {
        $products = Product::where('is_active', true)->orderBy('sort_order')->get();
        $posts = Post::where('is_published', true)->orderByDesc('published_at')->get();
        $nowIso = now()->toAtomString();

        $staticPages = [
            [
                'loc' => route('home'),
                'priority' => '1.0',
                'changefreq' => 'daily',
                'lastmod' => $nowIso,
                'image' => asset('images/projects/pju-k3-gempol-sidoarjo.webp'),
                'title' => 'PT. Multi Abadi Aksana - Spesialis PJU & Mechanical Electrical',
            ],
            [
                'loc' => route('products.index'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => $nowIso,
                'image' => asset('images/products/pju-all-in-one.webp'),
                'title' => 'Katalog Produk Penerangan Jalan Umum & Mechanical Electrical',
            ],
            [
                'loc' => route('products.index', ['divisi' => 'pju']),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => $nowIso,
                'image' => asset('images/products/pju-all-in-one.webp'),
                'title' => 'Katalog Penerangan Jalan Umum (Solar Cell & PLN)',
            ],
            [
                'loc' => route('products.index', ['divisi' => 'me']),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => $nowIso,
                'image' => asset('images/projects/me-impeller-rotor-stainless.webp'),
                'title' => 'Katalog Mechanical & Electrical (Panel, PLC, Tangki, Interior & Exterior)',
            ],
            [
                'loc' => route('gallery.index'),
                'priority' => '0.8',
                'changefreq' => 'weekly',
                'lastmod' => $nowIso,
                'image' => asset('images/projects/pju-crane-erection.webp'),
                'title' => 'Portofolio Projek On Duty PT. Multi Abadi Aksana',
            ],
            [
                'loc' => route('about'),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => $nowIso,
                'image' => asset('images/banners/corporate-meeting.webp'),
                'title' => 'Profil Perusahaan & 2 Divisi Layanan PT. Multi Abadi Aksana',
            ],
            [
                'loc' => route('blog.index'),
                'priority' => '0.8',
                'changefreq' => 'weekly',
                'lastmod' => $nowIso,
                'image' => asset('images/projects/pju-k3-gempol-sidoarjo.webp'),
                'title' => 'Wawasan Teknis & Artikel Pengadaan PT. Multi Abadi Aksana',
            ],
            [
                'loc' => route('contact'),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => $nowIso,
                'image' => asset('assets/logo.webp'),
                'title' => 'Hubungi Kantor & Workshop PT. Multi Abadi Aksana Sidoarjo',
            ],
        ];

        $out = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $out .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";

        foreach ($staticPages as $page) {
            $loc = htmlspecialchars($page['loc'], ENT_XML1);
            $imgLoc = htmlspecialchars($page['image'], ENT_XML1);
            $imgTitle = htmlspecialchars($page['title'], ENT_XML1);
            $out .= "  <url>\n";
            $out .= "    <loc>{$loc}</loc>\n";
            $out .= "    <lastmod>{$page['lastmod']}</lastmod>\n";
            $out .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
            $out .= "    <priority>{$page['priority']}</priority>\n";
            $out .= "    <image:image>\n";
            $out .= "      <image:loc>{$imgLoc}</image:loc>\n";
            $out .= "      <image:title>{$imgTitle}</image:title>\n";
            $out .= "    </image:image>\n";
            $out .= "  </url>\n";
        }

        foreach ($products as $product) {
            $loc = htmlspecialchars(route('products.show', $product->slug), ENT_XML1);
            $lastmod = ($product->updated_at ?? now())->toAtomString();
            $imgUrl = str_starts_with($product->thumbnail_url, 'http')
                ? $product->thumbnail_url
                : url($product->thumbnail_url);
            $imgLoc = htmlspecialchars(explode('?', $imgUrl)[0], ENT_XML1);
            $imgTitle = htmlspecialchars($product->name, ENT_XML1);

            $out .= "  <url>\n";
            $out .= "    <loc>{$loc}</loc>\n";
            $out .= "    <lastmod>{$lastmod}</lastmod>\n";
            $out .= "    <changefreq>weekly</changefreq>\n";
            $out .= "    <priority>0.85</priority>\n";
            $out .= "    <image:image>\n";
            $out .= "      <image:loc>{$imgLoc}</image:loc>\n";
            $out .= "      <image:title>{$imgTitle}</image:title>\n";
            $out .= "    </image:image>\n";
            $out .= "  </url>\n";
        }

        foreach ($posts as $post) {
            $loc = htmlspecialchars(route('blog.show', $post->slug), ENT_XML1);
            $lastmod = ($post->updated_at ?? $post->published_at ?? now())->toAtomString();
            $imgUrl = str_starts_with($post->featured_image_url, 'http')
                ? $post->featured_image_url
                : url($post->featured_image_url);
            $imgLoc = htmlspecialchars(explode('?', $imgUrl)[0], ENT_XML1);
            $imgTitle = htmlspecialchars($post->title, ENT_XML1);

            $out .= "  <url>\n";
            $out .= "    <loc>{$loc}</loc>\n";
            $out .= "    <lastmod>{$lastmod}</lastmod>\n";
            $out .= "    <changefreq>monthly</changefreq>\n";
            $out .= "    <priority>0.75</priority>\n";
            $out .= "    <image:image>\n";
            $out .= "      <image:loc>{$imgLoc}</image:loc>\n";
            $out .= "      <image:title>{$imgTitle}</image:title>\n";
            $out .= "    </image:image>\n";
            $out .= "  </url>\n";
        }

        $out .= '</urlset>';

        return $out;
    });

    return response($xml, 200, [
        'Content-Type' => 'application/xml; charset=UTF-8',
    ]);
})->name('sitemap');

// Decoy / Honeypot: Blokir & catat percobaan akses ke jalur admin standar (/admin, /wp-admin, /login, dll.)
Route::any('/{decoyPath}/{subpath?}', function () {
    Log::warning('[SECURITY] Percobaan akses ke URL jebakan (Decoy Path) diblokir', [
        'ip' => request()->ip(),
        'path' => request()->path(),
        'user_agent' => request()->userAgent(),
    ]);

    abort(404);
})->where('decoyPath', 'admin|administrator|wp-admin|wp-login\.php|panel|cp|backend|login')
    ->where('subpath', '.*');
