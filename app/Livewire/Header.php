<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        // جلب الأقسام الرئيسية (التي ليس لها أب)
        $mainCategories = Category::where('is_active', true)
            ->where('show_in_nav', true)
            ->whereNull('parent_id')
            ->with(['children' => function($query) {
                $query->where('is_active', true)
                      ->where('show_in_nav', true)
                      ->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->get();

        // جلب جميع الأقسام للبحث
        $allCategories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('livewire.header', compact('mainCategories', 'allCategories'));
    }
}
