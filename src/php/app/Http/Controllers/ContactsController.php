<?php

namespace App\Http\Controllers;

use App\Mail\ContactsSendmail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index()
    {
        // 入力ページを表示
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        // バリデーションルールを定義
        // 引っかかるとエラーを起こしてくれる
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
        ], [
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'Eメール形式で入力してください',
            'title.required' => 'お問い合わせ内容は必須です',
            'body.required' => '本文は必須です',
        ]);
        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 確認ページに表示
        // 入力値を引数に渡す
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }


    public function send(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
        ], [
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'Eメール形式で入力してください',
            'title.required' => 'お問い合わせ内容は必須です',
            'body.required' => '本文は必須です',
        ]);

        // actionの値を取得
        $action = $request->input('action');

        // actionとtitle以外のinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if ($action !== 'submit') {

            // 戻るボタンの場合リダイレクト処理
            return redirect()
                ->route('contact.index')
                //入力画面にリダイレクトした際に直前で入力した内容を表示する。
                ->withInput($inputs);
        } else {
            // 送信ボタンの場合、送信処理

            // ユーザにメールを送信
            Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
            // 自分(管理者)にメールを送信
            Mail::to('s.nomura.wk@gmail.com')->send(new ContactsSendmail($inputs));

            // 二重送信対策のためトークンを再発行
            // $request->session()->regenerateToken();

            // 送信完了ページのviewを表示
            return view('contact.thanks');
        }
    }

    public function sendOrderConfirmMail($order, $orderItem, $totalPrice)
    {
        //ユーザーの登録メールアドレスにメールを送信
        Mail::to($order->user->email)->send(new OrderConfirmationMail($order, $orderItem, $totalPrice));
        //お届け先のメールアドレスに送信
        // Mail::to($order->destination_email)->send(new OrderConfirmationMail($order, $orderItem,$totalPrice));
        // //自分（管理者）にメールを送信
        // Mail::to('s.nomura.wk@gmail.com')->send(new OrderConfirmationMail($order, $orderItem, $totalPrice));

    }
}
