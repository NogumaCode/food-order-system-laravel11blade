<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>パスワードリセット</title>
</head>

<body class="container">
    <h1>管理者用ログイン</h1>
    <x-error-messages />
    <x-session-messages />
    <form action="{{ route('admin.reset_password_submit') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
            <label for="password" class="form-label">新しいパスワード</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">確認用パスワード</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                required>
        </div>
        <button type="submit" class="btn btn-primary">送信する</button>
    </form>
</body>

</html>
