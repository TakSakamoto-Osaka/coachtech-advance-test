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
<form action="" method="post" class="content">
  <!-- お名前 -->
  <div class="input-elm">
    <label for="lastName" class="asterisk">お名前</label>
    <div class="inline-block">
      <input type="text" id="lastName" class="name" name="lastname">
      <span class="example">例）山田</span>
    </div>
    <div class="inline-block first-name">
      <input type="text" id="firstName" class="name" name="firstname">
      <span class="example">例）太郎</span>
    </div>
  </div>

  <!-- 性別 -->
  <div class="input-elm-gender">
    <label class="asterisk gender">性別</label>
    <div class="gender">
      <div class="gender-radio">
        <input type="radio" id="male" name="gender" value="1" checked />
        <label for="male" class="male">男性</label>
        <input type="radio" id="female" name="gender" value="2" />
        <label for="female" class="female">女性</label>
      </div>
    </div>
  </div>

  <!-- メールアドレス -->
  <div class="input-elm">
    <label for="email" class="asterisk">メールアドレス</label>
    <div class="inline-block">
      <input type="email" id="email" name="email">
      <span class="example">例）test@example.com</span>
    </div>
  </div>

  <!-- 郵便番号 -->
  <div class="input-elm">
    <label for="postcode" class="asterisk">郵便番号</label>
    <span class="postcode">〒</span>
    <div class="inline-block">
      <input type="text" id="postcode" class="postcode" name="postcode">
      <span class="example">例）123-4567</span>
    </div>
  </div>

  <!-- 住所 -->
  <div class="input-elm">
    <label for="address" class="asterisk">住所</label>
    <div class="inline-block">
      <input type="text" id="address" name="address">
      <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3</span>
    </div>
  </div>

  <!-- 建物名 -->
  <div class="input-elm">
    <label for="building">建物名</label>
    <div class="inline-block">
      <input type="text" id="building" name="building">
      <span class="example">例）千駄ヶ谷マンション101</span>
    </div>
  </div>

  <!-- ご意見 -->
  <div class="input-elm">
    <label for="opinion" class="asterisk">ご意見</label>
    <textarea id="opinion" rows="6" cols="60" class="opinion" name="opinion"></textarea>
  </div>

  <!-- 確認 -->
  <div class="btn-wrap btn-contact">
    <button>確認</button>
  </div>
</form>
@endsection

