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

        $pjuCategorySlugs = ['pju-tenaga-surya', 'pju-pln-tiang'];

        // Kategori terfilter berdasarkan divisi aktif
        $categoriesQuery = ProductCategory::where('is_active', true)->orderBy('sort_order');
        if ($this->selectedDivision === 'pju') {
            $categoriesQuery->whereIn('slug', $pjuCategorySlugs);
        } else {
            $categoriesQuery->whereNotIn('slug', $pjuCategorySlugs);
        }
        $categories = $categoriesQuery->get();

        $query = Product::with('category')->where('is_active', true);

        // Filter produk berdasarkan divisi
        if ($this->selectedDivision === 'pju') {
            $query->whereHas('category', function ($q) use ($pjuCategorySlugs) {
                $q->whereIn('slug', $pjuCategorySlugs);
            });
        } else {
            $query->whereHas('category', function ($q) use ($pjuCategorySlugs) {
                $q->whereNotIn('slug', $pjuCategorySlugs);
            });
        }

        // Filter berdasarkan sub-kategori
        if ($this->selectedCategory !== 'semua') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        // Pencarian kata kunci
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

        // Hitung total produk per divisi
        $pjuCount = Product::where('is_active', true)
            ->whereHas('category', fn($q) => $q->whereIn('slug', $pjuCategorySlugs))
            ->count();

        $meCount = Product::where('is_active', true)
            ->whereHas('category', fn($q) => $q->whereNotIn('slug', $pjuCategorySlugs))
            ->count();

        $activeDivisionName = $this->selectedDivision === 'pju'
            ? 'Penerangan Jalan Umum'
            : 'Mechanical & Electrical';

        return view('livewire.pages.product-catalog-page', [
            'categories' => $categories,
            'products' => $products,
            'pjuCount' => $pjuCount,
            'meCount' => $meCount,
            'activeDivisionName' => $activeDivisionName,
        ]);
    }
}
