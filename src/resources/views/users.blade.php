<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Greeting</title>
</head>
<body>
    <ul>
        @forelse ($users as $user)
            <li>{{ $user }}</li>
        @empty
            <p>ユーザーがいません</p>
        @endforelse
    </ul>
</body>
</html>