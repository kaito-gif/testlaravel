# CLAUDE.md

このファイルは、Claude Code (claude.ai/code) がこのリポジトリのコードを操作する際のガイダンスを提供します。

## プロジェクト概要

Laravel 12.0 + PHP 8.3 + MySQL 8.0 を使用したWebアプリケーション開発プロジェクトです。Docker環境で動作し、Tailwind CSS v4とViteを使用したフロントエンド構成を採用しています。

## Docker環境での開発

このプロジェクトは完全にDocker化されており、すべてのコマンドはDockerコンテナ内で実行する必要があります。

### コンテナ構成

- **app**: PHP 8.3-fpm (Composer 2.7, Node.js 24含む)
- **web**: nginx 1.25-alpine
- **db**: MySQL 8.0

### 環境の起動と停止

```bash
# 開発環境の起動
docker-compose up -d

# 環境の停止
docker-compose down

# データベースを含む完全削除
docker-compose down -v

# 本番環境での起動
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
```

## 主要コマンド

### Artisanコマンド

すべてのArtisanコマンドは`docker-compose exec app`を通じて実行します：

```bash
# マイグレーション実行
docker-compose exec app php artisan migrate

# マイグレーションロールバック
docker-compose exec app php artisan migrate:rollback

# キャッシュクリア
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Tinker起動
docker-compose exec app php artisan tinker

# キュー実行
docker-compose exec app php artisan queue:work

# ログ監視（Pail）
docker-compose exec app php artisan pail
```

### Composer操作

```bash
# パッケージインストール
docker-compose exec app composer install

# パッケージ追加
docker-compose exec app composer require パッケージ名

# 開発用パッケージ追加
docker-compose exec app composer require --dev パッケージ名

# オートロード再生成
docker-compose exec app composer dump-autoload

# セットアップスクリプト（環境構築時）
docker-compose exec app composer setup
```

### テスト実行

```bash
# 全テスト実行
docker-compose exec app php artisan test

# または
docker-compose exec app composer test

# 特定のテストファイル実行
docker-compose exec app php artisan test --filter TestClass

# PHPUnitを直接使用
docker-compose exec app vendor/bin/phpunit
```

### コード品質チェック

```bash
# Laravel Pint（コードスタイル自動修正）
docker-compose exec app vendor/bin/pint

# 修正なしでチェックのみ
docker-compose exec app vendor/bin/pint --test
```

### npm操作とフロントエンド開発

```bash
# パッケージインストール
docker-compose exec app npm install

# 開発サーバー起動（Vite + HMR）
docker-compose exec app npm run dev

# プロダクションビルド
docker-compose exec app npm run build
```

### コンテナアクセス

```bash
# PHPコンテナに入る
docker-compose exec app bash

# nginxコンテナに入る
docker-compose exec web sh

# MySQLコンテナに入る
docker-compose exec db bash

# MySQLに直接接続
docker-compose exec db mysql -u${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE}
```

## アーキテクチャ

### ディレクトリ構造

```
.
├── infra/              # Docker関連設定
│   ├── mysql/         # MySQL設定ファイル
│   ├── nginx/         # nginx設定ファイル
│   └── php/           # PHP-FPM Dockerfile、php.ini
├── src/               # Laravel プロジェクト本体
│   ├── app/
│   │   ├── Http/      # コントローラー、ミドルウェア
│   │   ├── Models/    # Eloquentモデル
│   │   └── Providers/ # サービスプロバイダー
│   ├── config/        # 設定ファイル
│   ├── database/      # マイグレーション、シーダー、ファクトリー
│   ├── public/        # 公開ディレクトリ（ドキュメントルート）
│   ├── resources/     # ビュー、CSS、JS
│   ├── routes/        # ルート定義
│   ├── storage/       # ログ、キャッシュ、アップロードファイル
│   └── tests/         # テストコード
├── docker-compose.yml      # 開発環境設定
└── docker-compose.prod.yml # 本番環境設定
```

### Vite + Tailwind CSS v4設定

- `vite.config.js`でLaravelプラグインとTailwind CSS v4プラグインを使用
- HMR（Hot Module Replacement）対応
- Docker環境でViteを動作させるため、ポート5173を公開

**重要**: Dockerコンテナ外からVite開発サーバーにアクセスする場合、`vite.config.js`に以下の設定が必要（現在は未設定）：

```javascript
server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    hmr: {
        host: 'localhost',
        port: 5173,
    },
}
```

### データベース接続

- 開発環境: Dockerコンテナ内のMySQL 8.0を使用
- 本番環境: Aurora MySQLを想定（docker-compose.prod.ymlではdbサービスなし）
- ホストから接続: `localhost:3306`
- 環境変数は`.env`ファイルで管理

### composer.jsonのカスタムスクリプト

プロジェクトには便利なComposerスクリプトが定義されています：

- `composer setup`: 初期セットアップ（依存関係インストール、.env作成、キー生成、マイグレーション、npm install/build）
- `composer dev`: 開発サーバー起動（artisan serve、queue、pail、viteを並行実行）
- `composer test`: 設定クリア後にテスト実行

## 開発ワークフロー

### 新機能開発の手順

1. マイグレーションファイル作成: `docker-compose exec app php artisan make:migration`
2. モデル作成: `docker-compose exec app php artisan make:model`
3. コントローラー作成: `docker-compose exec app php artisan make:controller`
4. ルート定義: `src/routes/web.php`または`src/routes/console.php`
5. マイグレーション実行: `docker-compose exec app php artisan migrate`
6. テスト作成: `docker-compose exec app php artisan make:test`
7. テスト実行: `docker-compose exec app php artisan test`

### フロントエンド開発

- CSS/JSファイルは`src/resources/`以下に配置
- Viteの開発サーバーを起動する場合: `docker-compose exec app npm run dev`
- ビルド成果物は`src/public/build/`に出力される

## 注意事項

- すべてのコマンドは`docker-compose exec app`経由で実行
- `src/storage`と`src/bootstrap/cache`には書き込み権限が必要
- `.env`ファイルは`.env.example`をコピーして作成
- データベースの永続化は`db-store`Dockerボリュームで管理
- 本番環境ではCloudFront + ACMの使用を推奨
