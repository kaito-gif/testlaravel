<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        button {
            background: #3183ff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #1a6cf5;
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
    <h1>商品登録</h1>

    <!-- エラーメッセージの全体表示（追加） -->
    @if($errors->any())
        <div style="background: #ffe0e0; border: 1px solid #ff0000; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            <strong style="color: #cc0000;">入力エラーがあります:</strong>
            <ul style="margin: 10px 0 0 20px; color: #cc0000;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">商品名: <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            <!-- 個別エラーメッセージ（追加） -->
            @error('name')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">価格: <span style="color: red;">*</span></label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">説明: <span style="color: red;">*</span></label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">登録</button>
    </form>

    <a href="/products" class="back-link">← 一覧に戻る</a>
</body>
</html>