<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品名');
            $table->text('description')->nullable()->comment('商品説明');
            $table->integer('price')->comment('価格');
            $table->integer('stock')->default(0)->comment('在庫数');
            $table->boolean('is_published')->default(false)->comment('公開状態');

            // 外部キー
            $table->foreignId('category_id')
                ->constrained()           // categories テーブルを参照
                ->onDelete('restrict');   // カテゴリーに商品がある場合は削除不可

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
