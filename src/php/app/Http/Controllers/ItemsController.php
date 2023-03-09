<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Topping;
use Illuminate\Http\Request;

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

     public function showItems(Request $request)
     {
            $query = Item::query();
         
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

