<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Topping;
use Illuminate\Http\Request;
use App\Http\Requests\KeyWordRequest;

class ItemsController extends Controller
{
    /**
     *商品一覧画面（ホーム画面）を表示するメソッド
     *
     *eroquentのallメソッドでItemsテーブルから全商品データを取得し変数$itemに格納したのちにviewに引き渡す。
     *paginate関数で1ページあたりの商品を制限 　
     *
     * @param Request $request　リクエスト
     * @return 商品一覧画面
     */

    public function showItems(KeyWordRequest $request)
    {

        $query = Item::query();

        //キーワード検索
        if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

        // カテゴリで絞り込み
        if ($request->filled('category')) {
            list($categoryType, $categoryID) = explode(':', $request->input('category'));

            if ($categoryType === 'primary') {
                $query->whereHas('secondaryCategory', function ($query) use ($categoryID) {
                    $query->where('primary_category_id', $categoryID);
                });
            } else if ($categoryType === 'secondary') {
                $query->where('secondary_category_id', $categoryID);
            }
        }
        //
        $items = $query->orderBy('price_m', 'asc')
            ->paginate(4);

        return view('items.item_list')
            ->with('items', $items);
    }


    /**
     * キーワード検索機能のためのエスケープ処理
     *
     * @param string $value 入力されたキーワード
     * @return エスケープ処理後のキーワード
     */
    private function escape(string $value)
    {
        return str_replace(
            ['\\', '%', '_'],
            ['\\\\', '\\%', '\\_'],
            $value
        );
    }


    public function searchItems(Request $request)
    {

        $query = Item::query();

        $validated = $request->validate(
            [
                'keyword' => 'required|max:100',
            ],
            [
                'keyword.required' => 'キーワードは必須です。',
                'keyword.max' => 'キーワードは最大100文字です',
            ]
        );


        //キーワード検索機能の実装
        if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

        $items = $query->orderBy('price_m', 'asc')
            ->paginate(5);

        return view('items.item_list')
            ->with('items', $items);
    }

    /**
     * 商品詳細画面を表示するメソッド
     *
     * @param Item $item  ルートモデルバインディングでurlで指定されたidに対応したitemオブジェクトと自動取得
     * @return 商品詳細画面
     */
    public function showItemDetail(Item $item)
    {
        $toppings = Topping::all();

        return view('items.item_detail')
            ->with([
                'item' => $item,
                'toppings' => $toppings,
            ]);
    }
}
