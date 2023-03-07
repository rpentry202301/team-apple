<?php

namespace App\Http\Controllers;
use App\Models\Item;
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
         $items = Item::all()->sortby('id');
         $items = Item::paginate(5);
 
         return view('items.item_list')
         ->with('items',$items);
     }
 
}
