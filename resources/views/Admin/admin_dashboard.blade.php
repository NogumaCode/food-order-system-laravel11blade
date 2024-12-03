<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>管理者用ダッシュボード</h1>
    <x-error-messages />
    <x-session-messages />
    <form action="{{ route('admin.logout') }}" method="post" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-link">ログアウト</button>
    </form>
</body>

</html>
