<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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

    #[Url(as: 'divisi')]
    public string $selectedDivision = 'pju';

    #[Url(as: 'kategori', except: 'semua')]
    public string $selectedCategory = 'semua';

    #[Url(as: 'cari', except: '')]
    public string $search = '';

    public function mount(): void
    {
        // Pastikan hanya 2 divisi: 'pju' (Penerangan Jalan Umum) atau 'me' (Mechanical & Electrical)
        if ($this->selectedDivision !== 'me') {
            $this->selectedDivision = 'pju';
        }
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function selectDivision(string $division): void
    {
        $this->selectedDivision = ($division === 'me') ? 'me' : 'pju';
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
        // Enforce valid division
        if ($this->selectedDivision !== 'me') {
            $this->selectedDivision = 'pju';
        }

        // Kategori terfilter berdasarkan divisi aktif
        $categories = Cache::remember(
            'catalog_categories_'.$this->selectedDivision,
            3600,
            fn () => ProductCategory::with('pillar')
                ->where('is_active', true)
                ->forDivision($this->selectedDivision)
                ->orderBy('sort_order')
                ->get()
        );

        $query = Product::with('category.pillar')
            ->where('is_active', true)
            ->whereHas('category', fn ($q) => $q->forDivision($this->selectedDivision));

        // Filter berdasarkan sub-kategori
        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        // Pencarian kata kunci
        if (! empty(trim($this->search))) {
            $searchTerm = '%'.trim($this->search).'%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('brand', 'like', $searchTerm)
                    ->orWhere('sub_badge', 'like', $searchTerm)
                    ->orWhere('short_summary', 'like', $searchTerm);
            });
        }

        $products = $query->orderBy('sort_order')->paginate(12);

        $activeDivisionName = $this->selectedDivision === 'pju'
            ? 'Penerangan Jalan Umum'
            : 'Mechanical & Electrical';

        $seoTitle = $this->selectedDivision === 'pju'
            ? 'Katalog Penerangan Jalan Umum (Solar Cell & PLN) | PT. Multi Abadi Aksana'
            : 'Katalog Mechanical & Electrical (Panel, PLC, Tangki, Interior & Exterior) | PT. Multi Abadi Aksana';

        $seoDesc = $this->selectedDivision === 'pju'
            ? 'Katalog spesifikasi pengadaan Penerangan Jalan Umum (PJU) Tenaga Surya All In One, Two In One, Konvensional, Lampu PJU PLN (COB, Osram, Philips, Estika) & Tiang Octagonal PT. Multi Abadi Aksana.'
            : 'Katalog Mechanical & Electrical: Fabrikasi Box Panel, Wiring Panel (MDP/SDP/MCC), PLC, Tangki BBM, Ducting BJLS, Silo, Struktur Baja, Impeller, MEP, BAS, serta Desain Interior & Exterior (3D Render, Built-In Furniture, Fasad, Kanopi) PT. Multi Abadi Aksana.';

        View::share([
            'title' => $seoTitle,
            'metaDescription' => $seoDesc,
            'canonicalUrl' => route('products.index', ['divisi' => $this->selectedDivision]),
            'ogImage' => $this->selectedDivision === 'pju'
                ? '/images/products/pju-all-in-one.webp'
                : '/images/products/me-box-panel-outdoor.webp',
        ]);

        return view('livewire.pages.product-catalog-page', [
            'categories' => $categories,
            'products' => $products,
            'activeDivisionName' => $activeDivisionName,
        ]);
    }
}
