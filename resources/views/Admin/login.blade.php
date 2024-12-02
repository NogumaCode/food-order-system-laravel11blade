<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>管理者ログイン</title>
</head>

<body class="container">
    <h1>管理者用ログイン</h1>
    <x-error-messages />
    <x-session-messages />
    <form action="{{ route('admin.login_submit') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3 form-check">
            <p>パスワードを忘れましたか？<a href="{{ route('admin.forget_password') }}">パスワードリセット</a></p>
        </div>
        <button type="submit" class="btn btn-primary">送信する</button>
    </form>
</body>

</html>
