<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('password_verified');
            $table->string('zipcode', 8);
            $table->string('prefecture', 200);
            $table->string('municipalities', 200);
            $table->string('address_line1', 200);
            $table->string('address_line2', 200);
            $table->string('telephone', 15);
            $table->rememberToken();

            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('status');
            $table->integer('total_price');
            $table->date('order_date');
            $table->string('destination_name', 100)->nullable();
            $table->string('destination_email', 100)->nullable();
            $table->string('destination_zipcode', 8)->nullable();
            $table->string('destination_prefectures', 200)->nullable();
            $table->string('destination_municipalities', 200)->nullable();
            $table->string('destination_address_line1', 200)->nullable();
            $table->string('destination_address_line2', 200)->nullable();
            $table->string('destination_tell', 15)->nullable();
            $table->timestamp('delivery_time')->nullable();
            $table->integer('payment_method')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('items', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price_m');
            $table->integer('price_l');
            $table->string('image_path');
            $table->boolean('deleted');

            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('quantity');
            $table->char('size'); //charなのでエラー出るかもしれません
            $table->integer('order_price');
            $table->String('order_name');
            $table->boolean('deleted');

            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('order_id')->references('id')->on('orders');
        });

        Schema::create('toppings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price_m');
            $table->string('price_l');

            $table->timestamps();
        });

        Schema::create('order_toppings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topping_id');
            $table->unsignedBigInteger('order_item_id');
            $table->integer('order_topping_price');
            $table->String('order_topping_name');
            $table->boolean('deleted');

            $table->timestamps();

            $table->foreign('topping_id')->references('id')->on('toppings');
            $table->foreign('order_item_id')->references('id')->on('order_items');
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('item_id');

            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('item_id')->references('id')->on('items');
        });

        Schema::create('cart_toppings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_item_id');
            $table->unsignedBigInteger('topping_id');

            $table->timestamps();

            $table->foreign('cart_item_id')->references('id')->on('cart_items');
            $table->foreign('topping_id')->references('id')->on('toppings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('items');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('toppings');
        Schema::dropIfExists('order_toppings');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('cart_toppings');
    }
};
