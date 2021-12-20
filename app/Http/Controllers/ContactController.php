<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ClientRequest;

class ContactController extends Controller
{
  public function show()
  {
    return view('contact');
  }
  public function confirm(ClientRequest $request)
  {
    $inputs = $request->all();
    unset($inputs['_token']);
    return view('confirm', ['inputs' => $inputs]);
  }
  public function send(Request $request)
  {
    if ($request->get('action') === 'back') {
      return redirect()->route('form.show')->withInput();
    }
    $inputs = $request->all();
    unset($inputs['_token']);
    unset($inputs['last-name']);
    unset($inputs['first-name']);
    unset($inputs['action']);
    Contact::create($inputs);
    return view('thanks');
  }
  public function manage()
  {
    //何かしらの検索結果を入れなければエラーとなるため、検索結果0となるように検索
    $result = Contact::where('fullname', "")->paginate(10);
    return view('management', ['forms' => $result]);
  }
  public function search(Request $request)
  {
    // 検索ボタン押下後、検索条件に入力した値は保持するかは悩みましたが、リセットすることにしました。
    // 検索条件が「全て入力しなくてもよい」なので、複雑になってしまった。改善余地あり。
    unset($request['_token']);
    if ($request->gender == '0') {
      if ($request->created_from == null && $request->created_to !== null) {
        $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
          ->whereDate('created_at', '<=', "{$request->created_to}")
          ->where('email', 'LIKE', "%{$request->email}%")
          ->paginate(10);
        return view('management', ['forms' => $result]);
      } elseif ($request->created_from !== null && $request->created_to == null) {
        $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
          ->whereDate('created_at', '>=', "{$request->created_from}")
          ->where('email', 'LIKE', "%{$request->email}%")
          ->paginate(10);
        return view('management', ['forms' => $result]);
      } elseif ($request->created_from == null && $request->created_to == null) {
        $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
          ->where('email', 'LIKE', "%{$request->email}%")
          ->paginate(10);
        return view('management', ['forms' => $result]);
      } else {
        $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
          ->whereDate('created_at', '<=', "{$request->created_to}")
          ->whereDate('created_at', '>=', "{$request->created_from}")
          ->where('email', 'LIKE', "%{$request->email}%")
          ->paginate(10);
        return view('management', ['forms' => $result]);
      }
    }
    if ($request->created_from == null && $request->created_to !== null) {
      $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
        ->where('gender', $request->gender)
        ->whereDate('created_at', '<=', "{$request->created_to}")
        ->where('email', 'LIKE', "%{$request->email}%")
        ->paginate(10);
      return view('management', ['forms' => $result]);
    } elseif ($request->created_from !== null && $request->created_to == null) {
      $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
        ->where('gender', $request->gender)
        ->whereDate('created_at', '>=', "{$request->created_from}")
        ->where('email', 'LIKE', "%{$request->email}%")
        ->paginate(10);
      return view('management', ['forms' => $result]);
    } elseif ($request->created_from == null && $request->created_to == null) {
      $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
        ->where('gender', $request->gender)
        ->where('email', 'LIKE', "%{$request->email}%")
        ->paginate(10);
      return view('management', ['forms' => $result]);
    } else {
      $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
        ->where('gender', $request->gender)
        ->whereDate('created_at', '<=', "{$request->created_to}")
        ->whereDate('created_at', '>=', "{$request->created_from}")
        ->where('email', 'LIKE', "%{$request->email}%")
        ->paginate(10);
      return view('management', ['forms' => $result]);
    }
  }
  public function delete(Request $request)
  {
    // ユーザビリティの観点から、削除ボタン押下後前のページに戻り同様の検索結果が表示されるよう処理
    Contact::find($request->id)->delete();
    if ($request->currentPage == 1) {
      return redirect($request->firstPage);
    } else {
      return back();
    }
  }
}
