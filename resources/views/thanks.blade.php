@extends("layouts.default")

<!-- ページ固有CSS -->
@section('pageCSS')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection


<!-- ページコンテンツ部 -->
@section('content')

<!-- トップページへ -->
<div>
  <p class="thanks">ご意見いただきありがとうございました。</p>
  <div class="btn-wrap btn-contact">
    <button>トップページへ</button>
  </div>

@endsection

