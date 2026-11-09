<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Galeri Projek On Duty | PT. Multi Abadi Aksana')]
class GalleryPage extends Component
{
    #[Url(as: 'kategori', except: 'semua')]
    public string $selectedCategory = 'semua';

    public function setCategory(string $category): void
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {
        $query = Gallery::query();

        if ($this->selectedCategory !== 'semua') {
            $query->where('category', $this->selectedCategory);
        }

        $galleries = $query->orderBy('sort_order')->orderByDesc('completion_date')->get();

        View::share([
            'metaDescription' => 'Dokumentasi portofolio Projek On Duty PT. Multi Abadi Aksana: Pemasangan PJU Tenaga Surya & PLN, Erection Tiang dengan Mobil Crane, serta Fabrikasi Impeller & Perawatan Mekanikal-Elektrikal Pabrik berstandar K3.',
            'canonicalUrl' => route('gallery.index'),
            'ogImage' => '/images/projects/pju-crane-erection.webp',
        ]);

        return view('livewire.pages.gallery-page', [
            'galleries' => $galleries,
        ]);
    }
}

