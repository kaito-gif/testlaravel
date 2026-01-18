<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧を表示
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'ノートPC', 'price' => 120000],
            ['id' => 2, 'name' => 'マウス', 'price' => 3000],
            ['id' => 3, 'name' => 'キーボード', 'price' => 8000],
        ];

        return view('products.index', compact('products'));
    }

    // 商品詳細を表示
    public function show($id)
    {
        $products = [
            1 => ['id' => 1, 'name' => 'ノートPC', 'price' => 120000, 'description' => '高性能なノートパソコンです'],
            2 => ['id' => 2, 'name' => 'マウス', 'price' => 3000, 'description' => 'ワイヤレスマウスです'],
            3 => ['id' => 3, 'name' => 'キーボード', 'price' => 8000, 'description' => 'メカニカルキーボードです'],
        ];

        // 指定されたIDの商品を取得（存在しない場合はnull）
        $product = $products[$id] ?? null;

        // 商品が見つからない場合は404エラー
        if (!$product) {
            abort(404, '商品が見つかりません');
        }

        return view('products.show', compact('product'));
    }

    // 商品登録フォームを表示
    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        // バリデーション（入力チェック）
        // 第2引数のカスタムメッセージは、Laravel-langパッケージを使えば省略できます
        $validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer|min:0|max:10000000',
            'description' => 'required|max:500',
        ], [
            // カスタムメッセージ（学習用に明示的に記述）
            // Laravel-langを使う場合は、この配列を省略して自動翻訳されたメッセージを使えます
            'name.required' => '商品名は必須です',
            'name.max' => '商品名は100文字以内で入力して！',
            'price.required' => '価格は必須です',
            'price.integer' => '価格は整数で入力してください',
            'price.min' => '価格は0円以上で入力してください',
            'price.max' => '価格は1000万円以下で入力してください',
            'description.required' => '説明は必須です',
            'description.max' => '説明は500文字以内で入力してください',
        ]);

        // ここでは実際の保存処理は行わない（次の講座でDB保存を学びます）

        // 商品一覧ページにリダイレクトし、成功メッセージを表示
        return redirect('/products')
            ->with('success', "商品「{$validated['name']}」を登録しました！");
    }
}