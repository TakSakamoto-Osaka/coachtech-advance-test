@extends("layouts.default")

<!-- ページ固有CSS -->
@section('pageCSS')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

<!-- 見出し -->
@section('headline')
<h1 class="content">お問い合わせ</h1>
@endsection

<!-- ページコンテンツ部 -->
@section('content')
<form action="{{ url('/contact') }}" method="post" class="content">
  @csrf

  <!-- お名前 -->
  <div class="input-elm">
    <label for="lastName" class="asterisk">お名前</label>
    <div class="inline-block">
      <input type="text" id="lastName" class="name" name="lastname" value={{ old('lastname') }}>
        <span class="example">例）山田&emsp;&emsp;
          <span id="lastname-valid-error" class="valid-error">
            @if($errors->has('lastname')) {{ $errors->first('lastname') }} @endif
          </span>
        </span>
    </div>

    <div class="inline-block first-name">
      <input type="text" id="firstName" class="name" name="firstname" value="{{ old('firstname') }}">
        <span class="example">例）太郎&emsp;&emsp;
          <span id="firstname-valid-error" class="valid-error">
            @if($errors->has('firstname')) {{ $errors->first('firstname') }} @endif
          </span>
        </span>
    </div>
  </div>

  <!-- 性別 -->
  <div class="input-elm-gender">
    <label class="asterisk gender">性別</label>
    <div class="gender">
      <div class="gender-radio">
        <input type="radio" id="male" name="gender" value="1" @if (old('gender') != "2") checked @endif />
        <label for="male" class="male">男性</label>

        <input type="radio" id="female" name="gender" value="2" @if (old('gender') == "2") checked @endif />
        <label for="female" class="female">女性</label>
      </div>
      <span id="gender-valid-error" class="valid-error gender-valid-error">
        @if($errors->has('gender')) {{ $errors->first('gender') }} @endif
      </span>
    </div>
  </div>

  <!-- メールアドレス -->
  <div class="input-elm">
    <label for="email" class="asterisk">メールアドレス</label>
    <div class="inline-block">
      <input type="email" id="email" name="email" maxlength="255" value="{{ old('email') }}">
        <span class="example">例）test@example.com&emsp;&emsp;
          <span id="email-valid-error" class="valid-error">
            @if($errors->has('email')) {{ $errors->first('email') }} @endif
          </span>
        </span>
    </div>
  </div>

  <!-- 郵便番号 -->
  <div class="input-elm">
    <label for="postcode" class="asterisk">郵便番号</label>
    <span class="postcode">〒</span>
    <div class="inline-block">
      <input type="text" id="postcode" class="postcode" name="postcode" value="{{ old('postcode') }}" oninput="inputChange(this)">
        <span class="example">例）123-4567&emsp;&emsp;
          <span id="postcode-valid-error" class="valid-error">
            @if($errors->has('postcode')) {{ $errors->first('postcode') }} @endif
          </span>
        </span>
    </div>
  </div>

  <!-- 住所 -->
  <div class="input-elm">
    <label for="address" class="asterisk">住所</label>
    <div class="inline-block">
      <input type="text" id="address" name="address" value={{ old('address') }}>
        <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3&emsp;&emsp;
          <span id=""address-valid-error class="valid-error">
            @if($errors->has('address')) {{ $errors->first('address') }} @endif
          </span>
        </span>
    </div>
  </div>

  <!-- 建物名 -->
  <div class="input-elm">
    <label for="building">建物名</label>
    <div class="inline-block">
      <input type="text" id="building" name="building" value="{{ old('building') }}">
      <span class="example">例）千駄ヶ谷マンション101</span>
    </div>
  </div>

  <!-- ご意見 -->
  <div class="input-elm">
    <label for="opinion" class="asterisk">ご意見</label>
    <textarea id="opinion" rows="6" cols="60" class="opinion" name="opinion" maxlength="120">{{ old('opinion') }}</textarea>
      <span id="opinion-valid-error" class="valid-error opinion-valid-error">
        @if($errors->has('opinion')) {{ $errors->first('opinion') }} @endif
      </span>
  </div>

  <!-- 確認 -->
  <div class="btn-wrap btn-contact">
    <button type="submit">確認</button>
  </div>
</form>
@endsection

<!-- JavaScript -->
@section('script')

//
//  入力フォーカスロスト時のイベント
//
function onBlur(obj) {
  
}

//
//  テキスト入力時のイベント
//
function inputChange(obj) {
  obj.value = hankaku2Zenkaku(obj.value); //  全角 -> 半角変換

  let pattern = /^[0-9]{3}-[0-9]{4}$/;    //  正規表現パターン

  if ( pattern.test( obj.value ) ) {      //  正しい郵便番号書式だった場合
    if ( document.getElementById("address").value == "" ) {  // 住所に何も入力されていない場合
      //  外部APIを用いて郵便番号から住所を取得
      let url = `http://zipcloud.ibsnet.co.jp/api/search?zipcode=${obj.value}`;

      fetch(url)
        .then(response => response.json())
        .then(data => {
          //  JSON取得結果から住所文字列生成
          address = data["results"][0]["address1"] + data["results"][0]["address2"] + data["results"][0]["address3"];

          document.getElementById("address").value = address;   //  住所入力テキストに代入
      });

    }

  }
}

//
//  全角 -> 半角 (英数字,ハイフン)変換
//
function hankaku2Zenkaku(s) {
    s = s.replace(/[！-～]/g, function(s){
        return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });
    s = s.replace(/[‐－―ー]/g, '-');
    return s;
}



@endsection

