<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <title>お問い合せ画面</title>
</head>

<body>
  <h1>お問い合わせ</h1>
  <form action="{{ route('form.confirm') }}" method="post" class="h-adr" name="contactform">
    @csrf
    <div>
      <label for="last-name" class="form-title-required">お名前</label>
      <input type="text" name="last-name" id="last-name" value="{{ old('last-name') }}" />
      <input type="text" name="first-name" id="first-name" value="{{ old('first-name') }}" />
    </div>
    <div>
      <span class="subform-title"></span>
      <span class="example">　例）山田</span>
      <span class="real-check" id="lastname-check">※姓を入力してください</span>
      @error('last-name')
        <span class="error-message" id="raraError-lastname">{{ $message }}</span>
      @enderror
      @if ($errors->has('last-name'))
        <span class="raraError" id="raraError"></span>
      @else
        <span class="jsError" id="jsError"></span>
      @endif
      <span class="example">　例）太郎</span>
      <span class="real-check" id="firstname-check">※名を入力してください</span>
      @error('first-name')
        <span class="error-message" id="raraError-firstname">{{ $message }}</span>
      @enderror
    </div>
    <div class="gender">
      <span class="form-title-required">性別</span>
      <input type="radio" name="gender" value="1" id="male" checked /><label for="male">男性</label>
      <input type="radio" name="gender" value="2" id="female" /><label for="female">女性</label>
    </div>
    <div class="form-example"></div>
    <div>
      <label for="email" class="form-title-required">メールアドレス</label>
      <input type="text" name="email" id="email" value="{{ old('email') }}" />
    </div>
    <div>
      <span class="subform-title"></span>
      <span class="example">　例）test@example.com</span>
      <span class="real-check" id="email-check">※メールアドレスを入力してください</span>
      <span class="real-check" id="email-format">※メールアドレスは例の形式で入力してください</span>
      @error('email')
        <span class="error-message" id="raraError-email">{{ $message }}</span>
      @enderror
    </div>
    <div>
      <label for="postcode" class="form-title-required">郵便番号</label>
      <span>　〒　</span>
      <input type="hidden" class="p-country-name" value="Japan">
      <input type="text" class="p-postal-code" name="postcode" id="postcode" value="{{ old('postcode') }}" />
    </div>
    <div>
      <span class="subform-postcode"></span>
      <span class="example">　例）123-4567</span>
      <span class="real-check" id="postcode-check">※郵便番号を入力してください</span>
      <span class="real-check" id="postcode-format">※郵便番号は例の形式で入力してください</span>
      @error('postcode')
        <span class="error-message" id="raraError-postcode">{{ $message }}</span>
      @enderror
    </div>
    <div>
      <label for="address" class="form-title-required">住所</label>
      <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" id="address"
        value="{{ old('address') }}" />
    </div>
    <div>
      <span class="subform-title"></span>
      <span class="example">　例）東京都渋谷区千駄ヶ谷1-2-3</span>
      <span class="real-check" id="address-check">※住所を入力してください</span>
      @error('address')
        <span class="error-message" id="raraError-address">{{ $message }}</span>
      @enderror
    </div>
    <div>
      <label for="building_name" class="form-title">建物名</label>
      <input type="text" name="building_name" id="building_name" value="{{ old('building_name') }}" />
    </div>
    <div>
      <span class="subform-title"></span>
      <span class="example">　例）千駄ヶ谷マンション101</span>
    </div>
    <div>
      <label for="opinion" class="form-title-required">ご意見</label>
      <textarea name="opinion" id="opinion" cols="30" rows="10" maxlength="120">{{ old('opinion') }}</textarea>
      <span class="subform-title"></span>
      <span class="real-check" id="opinion-check">※ご意見を入力してください</span>
      <span class="real-check" id="opinion-format">※ご意見は120文字以内で入力してください</span>
      @error('opinion')
        <span class="error-message" id="raraError-opinion">{{ $message }}</span>
      @enderror
    </div>
    <div class="confirm">
      <button type="submit">確認</button>
    </div>
  </form>
  <script src="{{ asset('js/contact.js') }}"></script>
  <script src="{{ asset('js/yubinbango.js') }}"></script>
</body>

</html>
