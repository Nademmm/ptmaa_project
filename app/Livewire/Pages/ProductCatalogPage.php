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

    #[Url(as: 'divisi', except: '')]
    public string $selectedDivision = '';

    #[Url(as: 'kategori', except: 'semua')]
    public string $selectedCategory = 'semua';

    #[Url(as: 'cari', except: '')]
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function selectDivision(string $division): void
    {
        $this->selectedDivision = $division;
        $this->selectedCategory = 'semua';
        $this->resetPage();
    }

    public function setCategory(string $slug): void
    {
        $this->selectedCategory = $slug;
        $this->resetPage();
    }

    public function render()
    {
        $pjuCategorySlugs = ['pju-tenaga-surya', 'pju-pln-tiang'];

        // Filter categories according to selected division
        $categoriesQuery = ProductCategory::where('is_active', true)->orderBy('sort_order');
        if ($this->selectedDivision === 'pju') {
            $categoriesQuery->whereIn('slug', $pjuCategorySlugs);
        } elseif ($this->selectedDivision === 'me') {
            $categoriesQuery->whereNotIn('slug', $pjuCategorySlugs);
        }
        $categories = $categoriesQuery->get();

        $query = Product::with('category')->where('is_active', true);

        // Filter products by division
        if ($this->selectedDivision === 'pju') {
            $query->whereHas('category', function ($q) use ($pjuCategorySlugs) {
                $q->whereIn('slug', $pjuCategorySlugs);
            });
        } elseif ($this->selectedDivision === 'me') {
            $query->whereHas('category', function ($q) use ($pjuCategorySlugs) {
                $q->whereNotIn('slug', $pjuCategorySlugs);
            });
        }

        // Filter by subcategory
        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        // Search query
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

        // Counts for gateway portal cards
        $pjuCount = Product::where('is_active', true)
            ->whereHas('category', fn($q) => $q->whereIn('slug', $pjuCategorySlugs))
            ->count();

        $meCount = Product::where('is_active', true)
            ->whereHas('category', fn($q) => $q->whereNotIn('slug', $pjuCategorySlugs))
            ->count();

        return view('livewire.pages.product-catalog-page', [
            'categories' => $categories,
            'products' => $products,
            'pjuCount' => $pjuCount,
            'meCount' => $meCount,
        ]);
    }
}
