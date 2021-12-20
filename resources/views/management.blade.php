<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/management.css') }}">
  <title>管理システム画面</title>
</head>

<body>
  <h1>管理システム</h1>
  <form action="{{ route('form.search') }}" method="post" class="form-content">
    @csrf
    <div>
      <label for="fullname" class="title">お名前</label>
      <input type="text" name="fullname" id="fullname" />
      <span class="title-gender">性別</span>
      <input type="radio" name="gender" value="0" id="all" checked /><label for="all">全て</label>
      <input type="radio" name="gender" value="1" id="male" /><label for="male">男性</label>
      <input type="radio" name="gender" value="2" id="female" />女性
    </div>
    <div>
      <label for="created_from" class="title">登録日</label>
      <input type="date" name="created_from" id="created_from" />
      <span>　〜　</span>
      <input type="date" name="created_to" id="created_to" />
    </div>
    <div>
      <label for="email" class="title">メールアドレス</label>
      <input type="text" name="email" id="email" />
    </div>
    <div class="confirm">
      <button type="submit" name="action" value="post">検索</button><br>
      <button type="submit" formaction={{ route('form.manage') }} name="action" value="back">リセット</button>
    </div>
  </form>
  <div class="table-page">
    <div>
      @if (count($forms) > 0)
        <p>全{{ $forms->total() }}件中
          {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 }}〜
          {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 + (count($forms) - 1) }}件</p>
      @else
        <p>データがありません。</p>
      @endif
    </div>
    <div>
      {{ $forms->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
  </div>
  <div class="form-table">
    <table>
      <colgroup span="1" class="table-id"></colgroup>
      <colgroup span="1" class="table-name"></colgroup>
      <colgroup span="1" class="table-gender"></colgroup>
      <colgroup span="1" class="table-email"></colgroup>
      <colgroup span="1" class="table-opinion"></colgroup>
      <colgroup span="1" class="table-button"></colgroup>
      <tr class="table-title">
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
        <th></th>
      </tr>
      @foreach ($forms as $form)
        <form action="{{ route('form.delete') }}" method="POST">
          @csrf
          <tr>
            <input type="hidden" name="firstPage" value="{{ $forms->url(1) }}">
            <input type="hidden" name="currentPage" value="{{ $forms->currentPage() }}">
            <td><input type="hidden" name="id" value="{{ $form->id }}">{{ $form->id }}</td>
            <td>{{ $form->fullname }}</td>
            <td>
              @if ($form->gender == '1')
                男性
              @elseif ($form->gender =='2')
                女性
              @endif
            </td>
            <td>{{ $form->email }}</td>
            <td class="opinion">{{ $form->opinion }}</td>
            <td class="delete"><button type="submit">削除</button></td>
          </tr>
        </form>
      @endforeach
    </table>
  </div>
</body>

</html>
