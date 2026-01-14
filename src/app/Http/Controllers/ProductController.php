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

    // フォームから送信されたデータを処理
    public function store(Request $request)
    {
        // 送信されたデータを取得
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        // 今回は画面に表示するだけ（次の講座でDBに保存します）
        return "商品「{$name}」(価格: " . number_format($price) . "円) を受け取りました！説明: {$description}";
    }
}