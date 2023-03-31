<?php

namespace App\View\Components;

use App\Models\Models\PrimaryCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //カテゴリー検索機能
        $user = Auth::user();

        $categories = PrimaryCategory::query()
            ->with([
                'secondaryCategories' => function ($query) {
                    $query->orderBy('sort_no');
                }
            ])
            ->orderBy('sort_no')
            ->get();

        //検索条件の取得
        $defaults = [
            'category' => Request::input('category', ''),
            'keyword' => Request::input('keyword'),
        ];

        //検索条件をViewに返す
        return view('components.header')
            ->with('user', $user)
            ->with('categories', $categories)
            ->with('defaults', $defaults);
    }
}
