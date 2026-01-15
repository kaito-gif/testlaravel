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
        $validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer|min:0|max:10000000',
            'description' => 'required|max:500',
        ]);

        // バリデーションが成功した場合のみここに到達
        return "商品「{$validated['name']}」(価格: " . number_format($validated['price']) . "円) を受け取りました！説明: {$validated['description']}";
    }
}