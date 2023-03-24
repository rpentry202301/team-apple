<?php

namespace Tests\Feature;

use Throwable;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\User;
use App\Models\CartItem;
use App\Models\CartTopping;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Cart\AddRequest;
use function PHPUnit\Framework\assertEquals;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * カート画面にログインした状態で画面遷移
     *
     * @return void
     */
    public function testCartPage()
    {
        $user = User::find(13);
        $response = $this->actingAs($user)->get('/cart');
        $response->assertStatus(200);
    }

    /**
     * AddRequestの送信
     *
     * @return void
     */
    public function testAddRequest()
    {
        $user = User::find(13);
        $this->actingAs($user);

        $request = new AddRequest([
            'item_id' => 1,
            'quantity' => 3
        ]);

        $response = $this->get('/cart', $request->all());

        $response->assertStatus(200);
    }

    /**
     * カートに商品を追加
     *
     * @return void
     */
    public function testAddCartItems()
    {
        // ユーザーログイン
        $user = User::find(13);
        $response = $this->actingAs($user);

        // カート生成
        $cart = new Cart;
        $cart->user_id = 13;
        $cart->save();
        $this->withSession(['cart' =>  $cart->id]);
        
        // テストの実行
        $response = $this->post(route('cart.add'), [
            'size' => 'M',
            'size_m' => '1490',
            'size_l' => '2570',
            'topping' => [
                0 => '1',
                1 => '3'
            ],
            'topping_m' => '200',
            'topping_l' => '300',
            'quantity' => '1',
            'id' => '2',
        ]);

        // テスト用のカートアイテムを作成する
        $expected_data = [
            'items' => [
                ['name' => 'アスパラ・ミート', 'price' => 1490],
            ],
            'toppings' => [
                ['name' => 'オニオン', 'price' => 200],
                ['name' => 'イタリアントマト', 'price' => 200],
            ],
            'total_price' => 2079,
            'tax' => 189
        ];
        
        $response->assertSessionHasAll([
            'items' => '',
            'toppings' => '',
            'total_price' => '',
            'tax' => ''
        ]);
    }

    /**
     * ショッピングカートの中身を表示
     *
     * @return void
     */
    public function testShowCartItems()
    {
        // カート生成
        $cart = new Cart;
        $cart->user_id = 13;
        $cart->save();
        $this->withSession(['cart_id' =>  $cart->id]);

        // カートアイテムを作成
        $item = new CartItem;
        $item->cart_id = $cart->id;
        $item->item_id = 1;
        $item->user_id = 13;
        $item->order_price = 1490;
        $item->quantity = 2;
        $item->size = 'M';
        $item->save();

        // カートトッピングを作成
        $topping = new CartTopping;
        $topping->cart_item_id = $item->id;
        $topping->topping_id = 1;
        $topping->user_id = 13;
        $topping->quantity = 1;
        $topping->total_topping_price = 300;
        $topping->save();

        // テストの実行
        $response = $this->get(route('cart'));

        // 変数の値が渡っていることを確認
        $response->assertSessionHasAll([
            'items' => '',
            'toppings' => '',
            'total_price' => '',
            'tax' => ''
        ]);
    }

    /**
     * カート削除
     *
     * @return void
     */
    public function testDeleteCartItems()
    {
        // カート生成
        $cart = new Cart;
        $cart->user_id = 13;
        $cart->save();
        $this->withSession(['cart_id' =>  $cart->id]);

        // カートアイテムを作成
        $item = new CartItem;
        $item->cart_id = $cart->id;
        $item->item_id = 1;
        $item->user_id = 13;
        $item->order_price = 1490;
        $item->quantity = 2;
        $item->size = 'M';
        $item->save();

        // カートトッピングを作成
        $topping = new CartTopping;
        $topping->cart_item_id = $item->id;
        $topping->topping_id = 1;
        $topping->user_id = 13;
        $topping->quantity = 1;
        $topping->total_topping_price = 300;
        $topping->save();

        // テストの実行
        $response = $this->post(route('cart.delete'), ['id' => $item->id]);

        // CartToppingとCartItemのレコードが削除されたことを確認する
        $this->assertDatabaseMissing('cart_toppings', ['cart_item_id' => $item->id]);
        $this->assertDatabaseMissing('cart_items', ['id' => $item->id]);
    }

    /**
     * 合計金額の計算
     *
     * @return void
     */
    public function testCalculateTotalPrice()
    {
        DB::beginTransaction(); // トランザクションを開始

        try {
            // カート生成
            $cart = new Cart;
            $cart->user_id = 13;
            $cart->save();
            $this->withSession(['cart_id' =>  $cart->id]);

            // カートアイテムを作成
            $item1 = new CartItem;
            $item1->cart_id = $cart->id;
            $item1->item_id = 1;
            $item1->user_id = 13;
            $item1->order_price = 1490;
            $item1->quantity = 2;
            $item1->size = 'M';
            $item1->save();

            $item2 = new CartItem;
            $item2->cart_id = $cart->id;
            $item2->item_id = 1;
            $item2->user_id = 13;
            $item2->order_price = 2570;
            $item2->quantity = 1;
            $item2->size = 'L';
            $item2->save();

            // カートトッピングを作成
            $topping1 = new CartTopping;
            $topping1->cart_item_id = $item2->id;
            $topping1->topping_id = 1;
            $topping1->user_id = 13;
            $topping1->quantity = 1;
            $topping1->total_topping_price = 300;
            $topping1->save();

            // 合計金額を計算
            $total_price = Cart::calculateTotalPrice([$item1, $item2], $topping1);
            
            // 期待値
            $expected_result = 6250; // 2 * 1490 + 1 * 2570 + 200 + 200 + 300

            $this->assertEquals($expected_result, $total_price);

            // トランザクションをコミット
            DB::commit();
            
            // 成功メッセージを出力
            echo 'カートアイテムとカートトッピングの作成に成功しました。';
        } catch (Throwable $e) {
            DB::rollBack(); // トランザクションをロールバックし、作成したデータを削除する
            
            // エラーメッセージを出力
            echo 'カートアイテムとカートトッピングの作成に失敗しました。エラー：' . $e->getMessage();
        }
    }

    /**
     * 消費税の計算
     *
     * @return void
     */
    public function testCalculateTax()
    {
        // 消費税を計算
        $total_price = 6250;
        $tax = Cart::calculateTax($total_price);

        // 期待値
        $expected_result = 625; // 6250 * 0.1

        $this->assertEquals($expected_result, $tax);
    }
}