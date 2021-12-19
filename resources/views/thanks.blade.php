<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
  <title>登録完了画面</title>
</head>

<body>
  <form action="{{ route('form.show') }}" method="GET" class="thanks">
    <div>ご意見いただきありがとうございました。</div>
    <button type="submit">トップページへ</button>
  </form>
</body>

</html>
