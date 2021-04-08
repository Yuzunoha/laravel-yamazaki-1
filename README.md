## 注意

- `make` から始まるコマンド(`make init` 等)は、Makefile があるディレクトリ(リポジトリ直下)で実行すること
- `docker-compose` から始まるコマンド(`docker-compose ps` 等)は、docker-compose.yml があるディレクトリ(リポジトリ直下)で実行すること
- コンテナが立ち上がらない等の不具合が出た場合は、作業進捗を push した後にディレクトリを削除し、再度 clone して初回セットアップすることを推奨する(初回セットアップと言っても push された作業進捗は失われない)

## 初回セットアップ手順

1. 下記のコマンドを実行する

   ```
   make init
   ```

   - PC の性能にもよるが時間が掛かる

   - ライブラリ提供元の変更によってログに warning や error が入ることがあるが、`make init` 自体が成功すれば問題ない

1. 起動した laravel アプリをブラウザで表示する

   - http://localhost:10580 にアクセスする

1. 起動した phpMyAdmin をブラウザで表示する

   - http://localhost:10581 にアクセスする

## コンテナを起動する方法

- 下記のコマンドを実行する

  ```
  make up
  ```

## コンテナを終了する方法

- 下記のコマンドを実行する

  ```
  make down
  ```

## コンテナの状態を確認する方法

- 下記のコマンドを実行する

  ```
  make ps
  ```

## app コンテナの bash を実行する方法

- 下記のコマンドを実行する

  ```
  make bash
  ```

## db コンテナの mysql を実行する方法

- 下記のコマンドを実行する

  ```
  make mysql
  ```

## マイグレーションとシーディングを行う方法

- 下記のコマンドを実行する

  ```
  make migrate-seed
  ```

## 備考

- ホスト側で html 配下のファイルを編集すれば app コンテナに反映される
- composer コマンドや artisan コマンドは app コンテナの bash で実行する
- laravel アプリは db コンテナの MySQL データベース:c9 に接続済みである

## artisan を使う方法

- 例 1) migration を行う方法

  - app コンテナの bash で 下記のコマンドを実行する

    ```
    docker@efba441bb520:/var/www/html/laravelapp$ php artisan migrate
    ```

- 例 2) HelloController を作成する方法

  - app コンテナの bash で 下記のコマンドを実行する

    ```
    docker@efba441bb520:/var/www/html/laravelapp$ php artisan make:controller HelloController
    ```
