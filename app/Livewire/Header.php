<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', true)
            ->where('show_in_nav', true)
            ->orderBy('order')
            ->get();

        return view('livewire.header', ['mainCategories' => $categories]);
    }
}
