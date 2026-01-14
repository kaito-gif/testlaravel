<!-- resources/views/products/index.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #f5f5f5;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
        }
        a {
            color: #3183ff;
            text-decoration: none;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
        .price {
            color: #666;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>商品一覧</h1>

    <p><a href="/products/create" style="background: #3183ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 20px;">新規登録</a></p>

    <ul>
        @foreach($products as $product)
            <li>
                <a href="/products/{{ $product['id'] }}">
                    {{ $product['name'] }}
                </a>
                <span class="price"> - {{ number_format($product['price']) }}円</span>
            </li>
        @endforeach
    </ul>
</body>
</html>