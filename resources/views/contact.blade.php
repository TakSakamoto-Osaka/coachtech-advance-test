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
      @unless($errors->has('lastname'))
        <span class="example">例）山田</span>
      @else
        <span class="example">例）山田&emsp;&emsp;<span class="valid-error">{{ $errors->first('lastname') }}</span></span>
      @endif

    </div>
    <div class="inline-block first-name">
      <input type="text" id="firstName" class="name" name="firstname" value={{ old('firstname') }}>
      @unless($errors->has('firstname'))
        <span class="example">例）太郎</span>
      @else
        <span class="example">例）太郎&emsp;&emsp;<span class="valid-error">{{ $errors->first('firstname') }}</span></span>
      @endif
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
      @if($errors->has('gender'))
        <span class="valid-error gender-valid-error">{{ $errors->first('gender') }}</span>
      @endif
    </div>
  </div>

  <!-- メールアドレス -->
  <div class="input-elm">
    <label for="email" class="asterisk">メールアドレス</label>
    <div class="inline-block">
      <input type="email" id="email" name="email" maxlength="255" value={{ old('email') }}>
      @unless($errors->has('email'))
        <span class="example">例）test@example.com</span>
      @else
        <span class="example">例）test@example.com&emsp;&emsp;<span class="valid-error">{{ $errors->first('email') }}</span></span>
      @endif
    </div>
  </div>

  <!-- 郵便番号 -->
  <div class="input-elm">
    <label for="postcode" class="asterisk">郵便番号</label>
    <span class="postcode">〒</span>
    <div class="inline-block">
      <input type="text" id="postcode" class="postcode" name="postcode" value={{ old('postcode') }}>
      @unless($errors->has('postcode'))
        <span class="example">例）123-4567</span>
      @else
        <span class="example">例）123-4567&emsp;&emsp;<span class="valid-error">{{ $errors->first('postcode') }}</span></span>
      @endif
    </div>
  </div>

  <!-- 住所 -->
  <div class="input-elm">
    <label for="address" class="asterisk">住所</label>
    <div class="inline-block">
      <input type="text" id="address" name="address" value={{ old('address') }}>
      @unless($errors->has('address'))
        <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3</span>
      @else
        <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3&emsp;&emsp;<span class="valid-error">{{ $errors->first('address') }}</span></span>
      @endif
    </div>
  </div>

  <!-- 建物名 -->
  <div class="input-elm">
    <label for="building">建物名</label>
    <div class="inline-block">
      <input type="text" id="building" name="building" value={{ old('building') }}>
      <span class="example">例）千駄ヶ谷マンション101</span>
    </div>
  </div>

  <!-- ご意見 -->
  <div class="input-elm">
    <label for="opinion" class="asterisk">ご意見</label>
    <textarea id="opinion" rows="6" cols="60" class="opinion" name="opinion" maxlength="120">{{ old('opinion') }}</textarea>
    @if($errors->has('opinion'))
      <span class="valid-error opinion-valid-error">{{ $errors->first('opinion') }}</span>
    @endif
  </div>

  <!-- 確認 -->
  <div class="btn-wrap btn-contact">
    <button type="submit">確認</button>
  </div>
</form>
@endsection

