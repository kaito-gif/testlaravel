<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Greeting</title>
</head>
<body>
    @if ($age >= 20)
    <p>成人です</p>
    @elseif ($age >= 13)
    <p>未成年です</p>
    @else
    <p>子供です</p>
    @endif
</body>
</html>