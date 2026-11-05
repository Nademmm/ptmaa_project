<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Katalog Produk & Material Pengadaan | PT. Multi Abadi Aksana')]
class ProductCatalogPage extends Component
{
    use WithPagination;

    #[Url(as: 'kategori', except: 'semua')]
    public string $selectedCategory = 'semua';

    #[Url(as: 'cari', except: '')]
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function setCategory(string $slug): void
    {
        $this->selectedCategory = $slug;
        $this->resetPage();
    }

    public function render()
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('sort_order')->get();

        $query = Product::with('category')->where('is_active', true);

        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        if (!empty(trim($this->search))) {
            $searchTerm = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('brand', 'like', $searchTerm)
                    ->orWhere('sub_badge', 'like', $searchTerm)
                    ->orWhere('short_summary', 'like', $searchTerm);
            });
        }

        $products = $query->orderBy('sort_order')->paginate(12);

        return view('livewire.pages.product-catalog-page', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}

