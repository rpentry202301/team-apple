<?php

namespace App\Mail;

use DateTime;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $userName;
    private $destinationName;
    private $totalPrice;
    private $orderItems;
    private $destinationZipcode;
    private $destinationPrefectures;
    private $destinationMunicipalities;
    private $destinationAddressLine1;
    private $destinationAddressLine2;
    private $deliveryTime;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $orderItems)
    {
        $this->userName = $order->user->name;
        $this->destinationName = $order->destination_name;
        $this->totalPrice  = $order->total_price;
        $this->orderItems = $orderItems;
        $this->destinationZipcode = $order->destination_zipcode;
        $this->destinationPrefectures = $order->destination_prefectures;
        $this->destinationMunicipalities = $order->destination_municipalities;
        $this->destinationAddressLine1 = $order->destination_address_line1;
        $this->destinationAddressLine2 = $order->destination_address_line2;

        $formattedDate = Carbon::parse($order->delivery_time)->format('Y年m月d日 H:i');
        $this->deliveryTime = $formattedDate;
    //カートから情報を取り出す方法について中島さんに聞く

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      
        return $this->view('orderConfirmMail.mail')
                ->from('s.nomura.wk@gmail.com')
                ->subject('pizapple【公式】:注文完了メール')
                ->with([
                        'userName' => $this->userName,
                        'totalPrice' => $this->totalPrice,
                        'destinationName' => $this->destinationName,
                        'destinationZipcode' => $this->destinationZipcode,
                        'destinationPrefectures' => $this->destinationPrefectures,
                        'destinationMunicipalities' => $this->destinationMunicipalities,
                        'destinationAddressLine1' => $this->destinationAddressLine1,
                        'destinationAddressLine2' => $this->destinationAddressLine2,
                        'deliveryTime' => $this->deliveryTime,
                        'orderItems' => $this->orderItems,
                      ]);
    }
}