## はじめに

- notion の案内をご確認ください

  - https://www.notion.so/codegym/Laravel-8f99fe83a527475db45ec42a8e02f75a

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

  - `exit` コマンドで bash から抜けられる

## db コンテナの mysql を実行する方法

- 下記のコマンドを実行する

  ```
  make mysql
  ```

  - `exit` コマンドで mysql から抜けられる

## マイグレーションとシーディングを行う方法

- 下記のコマンドを実行する

  ```
  make migrate-seed
  ```

## 例

- マイグレーションファイルを作成する

  - app コンテナの bash で下記のコマンドを実行する

    ```
    docker@39983adf6bac:/var/www/html/cms$ php artisan make:migration create_books_table --create=books
    ```

- マイグレーションを実行する

  - app コンテナの bash で下記のコマンドを実行する

    ```
    docker@39983adf6bac:/var/www/html/cms$ php artisan migrate
    ```
