# mahjon　review
php 自作
## 概要
麻雀レビューサイトの自作サイトです。雀荘を初めて利用される方、雀荘を利用したい方、雀荘がどのようなところか知りたい方に向けて作成しました。店舗詳細や他人の口コミ詳細がすぐ見れるようになっており、他人の気に入った口コミにお気に入りできる機能も搭載されているため自分が気になったお店もまとめやすくなっております。
 
## 使い方
**管理者ユーザー**  
管理者ユーザーでは新しい店舗を追加することができたり、一般ユーザーの口コミ、店舗詳細を編集できたりします。
また、管理者でも口コミの投稿、お気に入りができるようになっています。

**一般ユーザー(会員登録あり)**  
店舗の詳細や他人の口コミを確認することができます。
また、自身で口コミ投稿ができ、他人の口コミにお気に入りすることができます。

**ゲストユーザー(会員登録なし)**  
会員登録していないため、ログイン画面のみ閲覧可能です。
ログイン画面から新規会員登録ボタンで作成できます。
## 環境
xampp/MySQL/PHP
## データベース
DB名:mahjongs
phpMyAdminに上記のDBを作成して頂き、mahjongs.sqlをインポートお願いします。 また新規会員登録をして頂き、管理者ユーザーとして使っていただく際はお手数ですがMySQL上でusersテーブルのadminカラムを1にして頂きお使いください。 
