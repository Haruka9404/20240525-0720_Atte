## 作成したアプリケーション
Atte
スクリーンショット 2024-08-30 21.28.02.png

## 作成した目的
勤怠管理システム

## URL
- 開発環境： http://localhost/
- phpMyAdmin: http://localhost:8080/

## 昨日一覧
会員登録
ログイン
ログアウト（ログアウト後の画面遷移未完成）
勤務開始
勤務終了
休憩開始
休憩終了
日付別勤怠情報取得（未完成）
ページネーション

## 使用技術(実行環境)
- PHP8.3.0
- Laravel8.83.27
- MySQL8.0.26

## ER図
simulation1.drawio.png
![image](https://github.com/user-attachments/assets/251c3d6f-71ed-480a-82bc-62ba4b089e99)

## テーブル設計
Timestampsテーブル					
カラム名	型	PRIMARY KEY	UNIQUE KEY	NOT NULL	FOREIGN KEY
id	unsigned bigint	○		○	
user_id	unsigned bigint			○	○
date  unsigned date
attendance_start	datetime				
attendance_end	datetime				
created_at	timestamp				
updated_at	timestamp				
					
Usersテーブル					
カラム名	型	PRIMARY KEY	UNIQUE KEY	NOT NULL	FOREIGN KEY
id	unsigned bigint	○		○	
name	text		○	○	
email	varchar(255)		○	○	
pw	varchar(255)			○	
created_at	timestamp				
updated_at	timestamp				
					
RestTimesテーブル					
列名	型	PRIMARY KEY	UNIQUE KEY	NOT NULL	FOREIGN KEY
id	unsigned bigint	○		○	
timestamp_id	unsigned bigint			○	○
rest_start	datetime				
rest_end	datetime
created_at	timestamp				
updated_at	timestamp		

## 環境構築
**Dockerビルド**
1. `git clone git@github.com:estra-inc/confirmation-test-contact-form.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

> *MacのM1・M2チップのPCの場合、`no matching manifest for linux/arm64/v8 in the manifest list entries`のメッセージが表示されビルドができないことがあります。
エラーが発生する場合は、docker-compose.ymlファイルの「mysql」内に「platform」の項目を追加で記載してください*
```
mysql:
    platform: linux/x86_64(この文追加)
    image: mysql:8.0.26
    environment:
```

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. .envに以下の環境変数を追加

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

5. アプリケーションキーの作成
php artisan key:generate

6. マイグレーションの実行
php artisan migrate

7. シーディングの実行
php artisan db:seed
