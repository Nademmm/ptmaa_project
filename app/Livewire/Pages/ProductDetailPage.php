<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Services\WhatsAppGeneratorService;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ProductDetailPage extends Component
{
    public string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::with(['category.pillar'])
            ->where('slug', $this->slug)
            ->where('is_active', true)
            ->firstOrFail();

        $whatsAppUrl = WhatsAppGeneratorService::forProduct($product);
        $division = $product->division;

        $relatedProducts = Product::with('category.pillar')
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(3)
            ->get();

        if ($relatedProducts->count() < 3) {
            $moreProducts = Product::with('category.pillar')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->where('is_active', true)
                ->whereHas('category', fn ($q) => $q->forDivision($division))
                ->take(3 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($moreProducts);
        }

        $metaDesc = \Illuminate\Support\Str::limit(
            trim(strip_tags((string) ($product->short_summary ?: $product->description))),
            160
        );

        $keywords = implode(', ', array_filter([
            $product->name,
            $product->sub_badge,
            $product->brand,
            $product->category?->name,
            $product->division_name,
            'PT Multi Abadi Aksana',
            'Pengadaan Sidoarjo Jawa Timur',
        ]));

        View::share([
            'title' => "{$product->name} | PT. Multi Abadi Aksana",
            'metaDescription' => $metaDesc,
            'metaKeywords' => $keywords,
            'canonicalUrl' => route('products.show', $product->slug),
            'ogType' => 'product',
            'ogImage' => $product->thumbnail_url,
        ]);

        return view('livewire.pages.product-detail-page', [
            'product' => $product,
            'whatsAppUrl' => $whatsAppUrl,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
