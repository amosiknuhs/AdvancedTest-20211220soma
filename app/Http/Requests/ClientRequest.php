<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'last-name' => 'required',
      'first-name' => 'required',
      'gender' => 'required',
      'email' => 'required|email',
      'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
      'address' => 'required',
      'building_name' => 'nullable',
      'opinion' => 'required|max:120',
    ];
  }
  public function messages()
  {
    return [
      'last-name.required' => '※姓を入力してください',
      'first-name.required' => '※名を入力してください',
      'gender.required' => '※性別を選択してください',
      'email.required' => '※メールアドレスを入力してください',
      'email.email' => '※メールアドレスは例の形式で入力してください',
      'postcode.required' => '※郵便番号を入力してください',
      'postcode.regex' => '※郵便番号は例の形式で入力してください',
      'address.required' => '※住所を入力してください',
      'opinion.required' => '※ご意見を入力してください',
      'opinion.max' => '※ご意見は120文字以内で入力してください'
    ];
  }
}
