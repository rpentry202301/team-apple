# ECサイト概要

<img width="1440" alt="スクリーンショット 2023-03-14 18 31 21" src="https://user-images.githubusercontent.com/85116099/224985900-62fc053e-0555-48b1-bf34-c71a0ddb1222.png">


### プロジェクトをcloneし、動作確認を行う方法

##### clone(SSH)を行う
> git clone git@github.com:rpentry202301/team-apple.git

##### コンテナを立ち上げ、コンテナ内に入る
> docker compose build
> docker compose exec php bash

##### vendor(ライブラリ)のインストール
> composer install

##### APP_KEYの作成
> cp .env.example .env
php artisan key:generate

##### DBの作成とデータの挿入
> php artisan migrate
php artisan db:seed

##### localhostにて接続
> http://localhost/


### 基本機能
- ユーザ登録
- ログイン/ログアウト
- 商品一覧を表示(検索)
- 商品詳細を表示
- ショッピングカートに商品を追加/表示/削除
- 注文確認画面を表示
- 注文
- クレジットカードWebAPI連携機能(Pay.jp)
- 問い合わせ

### 追加機能
- ページング(商品一覧画面)
- 郵便番号から住所自動取得
- 合計金額自動反映(jQuery)

 ### 独自機能
 - いいね機能
 - タグ検索
 - 商品のクーポン
