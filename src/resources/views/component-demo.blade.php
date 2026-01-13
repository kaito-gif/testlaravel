<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コンポーネントデモ</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        h1 { color: #333; }
        h2 { color: #666; margin-top: 30px; }
    </style>
</head>
<body>
    <h1>コンポーネントデモ</h1>

    <h2>1. ボタンコンポーネント</h2>
    <x-button type="primary">プライマリー</x-button>
    <x-button type="secondary">セカンダリー</x-button>
    <x-button type="danger">削除</x-button>
    <x-button type="success">保存</x-button>

    <h2>2. アラートコンポーネント</h2>
    <x-alert type="success">
        保存に成功しました！
    </x-alert>

    <x-alert type="error">
        エラーが発生しました。もう一度お試しください。
    </x-alert>

    <x-alert type="warning">
        この操作は取り消せません。本当に削除しますか？
    </x-alert>

    <x-alert type="info">
        お知らせ: システムメンテナンスを実施します。
    </x-alert>

    <h2>3. カードコンポーネント</h2>
    <x-card title="ユーザー情報">
        <p><strong>名前:</strong> 山田太郎</p>
        <p><strong>メール:</strong> yamada@example.com</p>
        <p><strong>登録日:</strong> 2024年1月1日</p>

        <x-slot:footer>
            <x-button type="primary">編集</x-button>
            <x-button type="danger">削除</x-button>
        </x-slot:footer>
    </x-card>

    <x-card title="商品情報">
        <p><strong>商品名:</strong> Laravel入門書</p>
        <p><strong>価格:</strong> 3,000円</p>
        <p><strong>在庫:</strong> 100冊</p>
    </x-card>
</body>
</html>