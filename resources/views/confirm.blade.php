<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
  <title>内容確認画面</title>
</head>

<body>
  <h1>内容確認</h1>
  <form action="{{ route('form.send') }}" method="post" name="contact-form" class="contact-form">
    @csrf
    <div class="row">
      <label class="form-title">お名前</label>
      {{ $inputs['last-name'] }}
      <span>　</span>
      {{ $inputs['first-name'] }}
      <input type="hidden" name="fullname" value="{{ $inputs['last-name'] }}{{ $inputs['first-name'] }}" />
      <input type="hidden" name="last-name" value="{{ $inputs['last-name'] }}" />
      <input type="hidden" name="first-name" value="{{ $inputs['first-name'] }}" />
    </div class="row">
    <div class="row">
      <span class="form-title">性別</span>
      @if ($inputs['gender'] === '1')
        <span>男性</span>
      @elseif ($inputs['gender'] === '2')
        <span>女性</span>
      @endif
      <input type="hidden" name="gender" value="{{ $inputs['gender'] }}" />
    </div>
    <div class="row">
      <label class="form-title">メールアドレス</label>
      {{ $inputs['email'] }}
      <input type="hidden" name="email" value="{{ $inputs['email'] }}" />
    </div>
    <div class="row">
      <label class="form-title">郵便番号</label>
      {{ $inputs['postcode'] }}
      <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}" />
    </div>
    <div class="row">
      <label class="form-title">住所</label>
      {{ $inputs['address'] }}
      <input type="hidden" name="address" value="{{ $inputs['address'] }}" />
    </div>
    <div class="row">
      <label class="form-title">建物名</label>
      {{ $inputs['building_name'] }}
      <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}" />
    </div>
    <div class="row">
      <span class="form-title">ご意見</span>
      <span class="opinion">{{ $inputs['opinion'] }}</span>
      <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
    </div>
    <div class="confirm">
      <button type="submit" name="action" value="post">送信</button><br>
      <button type="submit" name="action" value="back">修正する</button>
    </div>
  </form>
</body>

</html>
