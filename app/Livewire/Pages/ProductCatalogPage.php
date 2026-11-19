<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
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

        $activeCatModel = $this->selectedCategory !== 'semua'
            ? $categories->firstWhere('slug', $this->selectedCategory)
            : null;

        if ($activeCatModel) {
            $seoTitle = "{$activeCatModel->name} ({$activeDivisionName}) | PT. Multi Abadi Aksana";
            $canonicalUrl = route('products.index', ['divisi' => $this->selectedDivision, 'kategori' => $activeCatModel->slug]);
        } else {
            $seoTitle = $this->selectedDivision === 'pju'
                ? 'Katalog Penerangan Jalan Umum (Solar Cell & PLN) | PT. Multi Abadi Aksana'
                : 'Katalog Mechanical & Electrical (Listrik Gedung, Panel Besar LVMDP/MDP & Interior) | PT. Multi Abadi Aksana';
            $canonicalUrl = route('products.index', ['divisi' => $this->selectedDivision]);
        }

        $seoDesc = $this->selectedDivision === 'pju'
            ? 'Katalog spesifikasi pengadaan Penerangan Jalan Umum (PJU) Tenaga Surya All In One, Two In One, Konvensional, Lampu PJU PLN (COB, Osram, Philips, Estika) & Tiang Octagonal PT. Multi Abadi Aksana.'
            : 'Katalog Mechanical & Electrical: Instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran, mall), Fabrikasi Box & Wiring Panel Kapasitas Besar (LVMDP, MDP, SDP, MCC/Switchgear, Kapasitor Bank, Sinkronisasi Genset), PLC, Impeller & Centrifugal Blower, Konstruksi MEP, E&I, dan Building Automation System (BAS) PT. Multi Abadi Aksana.';

        $isSearchQuery = trim($this->search) !== '';

        View::share([
            'title' => $seoTitle,
            'metaDescription' => $seoDesc,
            'canonicalUrl' => $canonicalUrl,
            'robotsMeta' => $isSearchQuery ? 'noindex, follow' : null,
            'ogImage' => $this->selectedDivision === 'pju'
                ? '/images/products/pju-all-in-one.webp'
                : '/images/products/me-box-panel-outdoor.webp',
        ]);

        return view('livewire.pages.product-catalog-page', [
            'categories' => $categories,
            'products' => $products,
            'activeDivisionName' => $activeDivisionName,
        ])->title($seoTitle);
    }
}
