// ----------全角を半角に自動変換---------- //

function replaceFullToHalf(str) {
  var halfVal = str.replace(/[！-～]/g, function(s) {
    return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
  });
  return halfVal.replace(/ー/g, "-");
}

// var form = document.forms.contactform;
var PostCode = document.getElementById("postcode");
PostCode.addEventListener('change', function() {
  var strdata = document.getElementById("postcode").value;
  var handata = replaceFullToHalf(strdata);
  document.getElementById("postcode").value = handata;
});

// ----------入力チェック---------- //

// 「姓」必須チェック
var lastName = document.getElementById("last-name");
lastName.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorLname = document.getElementById('raraError-lastname');
  if (raraErrorLname != null) raraErrorLname.classList.add('hidden');

  var errLastName = document.getElementById('lastname-check');
  var JsError = document.getElementById('jsError');
  if (!lastName.value) {
    errLastName.classList.add('visible');
    if (JsError != null) JsError.classList.add('widChange');
    return;
  } else {
    errLastName.classList.remove('visible');
    if (JsError != null) JsError.classList.remove('widChange');
  }
})

// 「名」必須チェック
var firstName = document.getElementById("first-name");
firstName.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorFname = document.getElementById('raraError-firstname');
  if (raraErrorFname != null) raraErrorFname.classList.add('hidden');

  var errFirstName = document.getElementById('firstname-check');
  if (!firstName.value) {
    errFirstName.classList.add('visible');
    return;
  } else {
    errFirstName.classList.remove('visible');
  }
})

// 「メールアドレス」必須チェック＋形式チェック
var mailAddress = document.getElementById("email");
mailAddress.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorMail = document.getElementById('raraError-email');
  if (raraErrorMail != null) raraErrorMail.classList.add('hidden');

  var mailReg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
  var errMailAddress = document.getElementById('email-check');
  var errMailFormat = document.getElementById('email-format');
  if (!mailAddress.value) {
    errMailAddress.classList.add('visible');
    errMailFormat.classList.remove('visible');
    return;
  } else if (!mailReg.test(mailAddress.value)) {
    errMailAddress.classList.remove('visible');
    errMailFormat.classList.add('visible');
    return;
  } else {
    errMailAddress.classList.remove('visible');
    errMailFormat.classList.remove('visible');
  }
})
// 「郵便番号」必須チェック＋形式チェック（ハイフンありで8文字以内）
var postCode = document.getElementById("postcode");
postCode.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorPcode = document.getElementById('raraError-postcode');
  if (raraErrorPcode != null) raraErrorPcode.classList.add('hidden');

  var postReg = /^[0-9]{3}\-[0-9]{4}$/;
  var errPostCode = document.getElementById('postcode-check');
  var errPostFormat = document.getElementById('postcode-format');
  if (!postCode.value) {
    errPostCode.classList.add('visible');
    errPostFormat.classList.remove('visible');
    return;
  } else if (!postReg.test(postCode.value)) {
    errPostCode.classList.remove('visible');
    errPostFormat.classList.add('visible');
    return;
  } else {
    errPostCode.classList.remove('visible');
    errPostFormat.classList.remove('visible');
  }
})

// 「住所」必須チェック
var myAddress = document.getElementById("address");
myAddress.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorAdr = document.getElementById('raraError-address');
  if (raraErrorAdr != null) raraErrorAdr.classList.add('hidden');

  var errAddress = document.getElementById('address-check');
  if (!myAddress.value) {
    errAddress.classList.add('visible');
    return;
  } else {
    errAddress.classList.remove('visible');
  }
})

// 「ご意見」必須チェック＋形式チェック（120文字以内）※制御するので厳密には不必要
var myOpinion = document.getElementById("opinion");
myOpinion.addEventListener('blur', function() {
  // Laravelのバリデーション後、jsでのチェックと重複しないように処理
  var raraErrorOpi = document.getElementById('raraError-opinion');
  if (raraErrorOpi != null) raraErrorOpi.classList.add('hidden');

  var strCount = myOpinion.value.length;
  var errOpinion = document.getElementById('opinion-check');
  var errOpinionFormat = document.getElementById('opinion-format');
  if (!myOpinion.value) {
    errOpinion.classList.add('visible');
    errOpinionFormat.classList.remove('visible');
    return;
  } else if (strCount > 120) {
    errOpinion.classList.remove('visible');
    errOpinionFormat.classList.add('visible');
    return;
  } else {
    errOpinion.classList.remove('visible');
    errOpinionFormat.classList.remove('visible');
  }
})