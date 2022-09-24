@extends("layouts.default")

<!-- ページ固有CSS -->
@section('pageCSS')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

<!-- 見出し -->
@section('headline')
<h1 class="confirm">内容確認</h1>
@endsection

<!-- ページコンテンツ部 -->
@section('content')
<div class="content">
  <!-- お名前 -->
  <div class="confirm-elm">
    <label class="confirm">お名前</label>
    <span>{{$data['lastname']}}{{$data['firstname']}}</span>
  </div>

  <!-- 性別 -->
  <div class="confirm-elm">
    <label class="confirm">性別</label>
    @if( $data['gender'] == "1" )
      <span>男性</span>
    @endif
    @if( $data['gender'] == "2" )
      <span>女性</span>
    @endif
  </div>

  <!-- メールアドレス -->
  <div class="confirm-elm">
    <label class="confirm">メールアドレス</label>
    <span>{{$data['email']}}</span>
  </div>

  <!-- 郵便番号 -->
  <div class="confirm-elm">
    <label class="confirm">郵便番号</label>
    <span>{{$data['postcode']}}</span>
  </div>

  <!-- 住所 -->
  <div class="confirm-elm">
    <label class="confirm">住所</label>
    <span>{{$data['address']}}</span>
  </div>

  <!-- 建物名 -->
  <div class="confirm-elm">
    <label class="confirm">建物名</label>
    <span>{{$data['building']}}</span>
  </div>

  <!-- ご意見 -->
  <div class="confirm-elm">
    <label class="confirm">ご意見</label>
    <p class="confirm-opinion">
      {!! nl2br(e($data['opinion'])) !!}
    </p>
  </div>

  <!-- 送信 -->
  <div class="btn-wrap btn-contact">
    <button onclick="location.href='/contact/thanks'">送信</button>
    <a href="/contact" class="block">修正する</a>
  </div>

  <!-- 修正する -->

</div>

@endsection

