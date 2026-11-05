<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Services\WhatsAppGeneratorService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ProductDetailPage extends Component
{
    public string $slug;
    public ?int $quantity = 1;
    public string $unit = 'Unit';

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

        $whatsAppUrl = WhatsAppGeneratorService::forProduct($product, $this->quantity, $this->unit);

        $relatedProducts = Product::with('category')
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $moreProducts = Product::with('category')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->where('is_active', true)
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($moreProducts);
        }

        return view('livewire.pages.product-detail-page', [
            'product' => $product,
            'whatsAppUrl' => $whatsAppUrl,
            'relatedProducts' => $relatedProducts,
        ])->title("{$product->name} | PT. Multi Abadi Aksana");
    }
}
