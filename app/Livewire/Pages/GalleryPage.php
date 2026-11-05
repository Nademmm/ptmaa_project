<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
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

        return view('livewire.pages.gallery-page', [
            'galleries' => $galleries,
        ]);
    }
}

