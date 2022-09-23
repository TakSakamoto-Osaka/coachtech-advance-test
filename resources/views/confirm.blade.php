@extends("layouts.default")

<!-- ページ固有CSS -->
@section('pageCSS')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('headline')
<h1 class="confirm">内容確認</h1>
@endsection

<!-- ページコンテンツ部 -->
@section('content')
<div class="content">
  <!-- お名前 -->
  <div class="confirm-elm">
    <label class="confirm">お名前</label>
    <span>山田　太郎</span>
  </div>

  <!-- 性別 -->
  <div class="confirm-elm">
    <label class="confirm">性別</label>
    <span>男性</span>
  </div>

  <!-- メールアドレス -->
  <div class="confirm-elm">
    <label class="confirm">メールアドレス</label>
    <span>test@example.com</span>
  </div>

  <!-- 郵便番号 -->
  <div class="confirm-elm">
    <label class="confirm">郵便番号</label>
    <span>123-4567</span>
  </div>

  <!-- 住所 -->
  <div class="confirm-elm">
    <label class="confirm">住所</label>
    <span>東京都渋谷区千駄ヶ谷1-2-3</span>
  </div>

  <!-- 建物名 -->
  <div class="confirm-elm">
    <label class="confirm">建物名</label>
    <span>千駄ヶ谷マンション101</span>
  </div>

  <!-- ご意見 -->
  <div class="confirm-elm">
    <label class="confirm">ご意見</label>
    <div class="confirm-opinion">
      いつもお世話になっております。先日、貴社製品を購入させていただ
      きました。この度、不具合が生じ、説明書に沿って操作を進めていま
      したが上手く行きませんでした。どのように直せば良いかご教授いた
      だきたいです。
    </div>
  </div>

  <!-- 送信 -->
  <div class="btn-wrap">
    <button>送信</button>
    <a href="" class="block">修正する</a>
  </div>

  <!-- 修正する -->

</div>

@endsection

