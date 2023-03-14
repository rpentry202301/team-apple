<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactsSendmail extends Mailable
{
    use Queueable, SerializesModels;

    // プロパティを定義
    private $email;
    private $title;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        // コンストラクタでプロパティに値を格納
        $this->email = $inputs['email'];
        if ($inputs['title'] == 'item-and-service')
         {
            $this->title = '商品やサービスについて';
         }
        elseif ($inputs['title'] == 'homepage')
        {
          $this->title = 'ホームページについて';
        }
        else
        {
         $this->title = 'その他';
        }

        $this->title = $inputs['title'];
        $this->body = $inputs['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // メールの設定
        return $this
            ->from('s.nomura.wk@gmail.com')
            ->subject('pizapple【公式】:お問い合わせ内容確認メール')
            ->view('contact.mail')
            ->with([
                'email' => $this->email,
                'title' => $this->title,
                'body' => $this->body,
            ]);
    }
}




// //クーポン機能の下書き
// $couponCode = CouponUser::DB->where('user_id', Auth::user->id())->CouponCode
// $inputCode = $request['couponcode'];

// if($couponcode){
//         if($couponcode == $inputCode)
// }
// else{}