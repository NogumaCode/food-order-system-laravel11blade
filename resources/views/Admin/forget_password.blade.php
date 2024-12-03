<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>パスワードリセットページ</title>
</head>

<body class="container">
    <h1>パスワードリセットフォーム</h1>
     <x-error-messages />
     <x-session-messages />
    <form action="{{ route('admin.password_submit') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
            required aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">パスワードをリセットする</button>
    </form>
</body>

</html>
