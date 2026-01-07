<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>XSS攻撃デモ</title>
    <style>
        .danger { border: 3px solid red; padding: 20px; margin: 20px; background: #ffe0e0; }
        .safe { border: 3px solid green; padding: 20px; margin: 20px; background: #e0ffe0; }
    </style>
</head>
<body>
    <h1>XSS攻撃のデモ</h1>

    <div class="danger">
        <h2>❌ エスケープしない場合</h2>
        <p>コメント: {!! $comment !!}</p>
    </div>

    <div class="safe">
        <h2>✅ エスケープする場合</h2>
        <p>コメント: {{ $comment }}</p>
    </div>
</body>
</html>