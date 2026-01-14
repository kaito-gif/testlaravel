<!-- resources/views/products/show.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }}</title>
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
        .info {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .price {
            font-size: 24px;
            color: #3183ff;
            font-weight: bold;
        }
        .description {
            margin: 20px 0;
            line-height: 1.6;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #3183ff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>{{ $product['name'] }}</h1>

    <div class="info">
        <div class="price">{{ number_format($product['price']) }}円</div>
        <div class="description">{{ $product['description'] }}</div>
    </div>

    <a href="/products" class="back-link">← 一覧に戻る</a>
</body>
</html>