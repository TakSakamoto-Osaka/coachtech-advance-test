@extends("layouts.default")

<!-- ページ固有CSS -->
@section('pageCSS')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

<!-- 見出し -->
@section('headline')
<h1 class="admin">管理システム</h1>
@endsection

<!-- ページコンテンツ部 -->
@section('content')
<form action="/admin/search?page={{$page}}" method="post" class="admin">
  @csrf

  <div class="search-condition">
    <div class="input-elm">
      <!-- お名前 -->
      <label for="fullname" id="search-name">お名前</label>
      <input type="text" id="fullname" class="search-text search-fullname" name="fullname" value="{{$search['fullname']}}">

      <!-- 性別 -->
      <label class="gender">性別</label>
      <div class="gender">
        <div class="gender-radio rdb-gender-offset">
          <input type="radio" id="all" name="gender" value="0" @if ($search['gender'] == 0 ) checked @endif />
          <label for="all" class="all-gender">全て</label>
          <input type="radio" id="male" name="gender" value="1" @if ($search['gender'] == 1 ) checked @endif />
          <label for="male" class="male">男性</label>
          <input type="radio" id="female" name="gender" value="2" @if ($search['gender'] == 2 ) checked @endif />
          <label for="female" class="female">女性</label>
        </div>
      </div>
    </div>

    <!-- 登録日 -->
    <div class="input-elm">
      <label for="create-at-start" class="create-at">登録日</label>
      <input type="date" id="create-at-start" onfocus="onFocus(this)" onblur="onBlur(this)" name="create-at-start" value="{{$search['create-at-start']}}">
      <span class="range">〜</span>
      <input type="date" id="create-at-end"  onfocus="onFocus(this)" onblur="onBlur(this)" name="create-at-end" value="{{$search['create-at-end']}}">
    </div>

    <div class="input-elm">
      <!-- メールアドレス -->
      <label for="email">メールアドレス</label>
      <input type="text" id="email" class="search-text" name="email" value="{{$search['email']}}">
    </div>


  <!-- 検索 -->
  <div class="btn-wrap btn-search">
    <button>検索</button>
    <a href="/admin/reset?page={{$page}}" class="block">リセット</a>
  </div>
</div>
</form>

<!--  ページネーション  -->

<!--  問い合わせ内容一覧  -->
<table>
  <thead>
    <tr>
      <th class="id">ID</th>
      <th class="name">お名前</th>
      <th class="gender">性別</th>
      <th class="email">メールアドレス</th>
      <th class="opinion">ご意見</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    {{$contacts->links('vendor.pagination.custom')}}

    @foreach ( $contacts as $contact )
    <tr class="contact">
      <td class="id">{{$contact->id}}</td>
      <td class="name">{{$contact->fullname}}</td>
      @if ( $contact->gender == 1 )
      <td class="gender">男性</td>
      @endif
      
      @if ( $contact->gender == 2 )
      <td class="gender">女性</td>
      @endif

      <td class="email">{{$contact->email}}</td>
      <td class="opinion tooltip">{{mb_substr($contact->opinion,0,25)}}@if (mb_strlen($contact->opinion) >= 25)...@endif
        <span class="description">
          {!! nl2br(e($contact->opinion)) !!}
        </span>
      </td>
      <td class="delete"><a href="/admin/delete?id={{$contact->id}}&page={{$page}}" class="delete">削除</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection

<!-- JavaScript -->
@section('script')

//
//  ページロード時のイベント
//
window.onload = function() {
  //  日付選択テキストの文字色を透明にし、'年/月/日' 表示を見えないようにする
  const qs = document.querySelectorAll('input[type="date"]');

  qs.forEach(function(element){
    if ( element.value == "" ) {      //  日にちが指定されていない場合
      element.style.color = 'transparent';
    } else {
      element.style.color = 'black';
    }
  });
}

//
//  日付入力フォーカス取得時のイベント
//
function onFocus(obj) {
  obj.style.color = 'black';
}

//
//  日付入力フォーカスロスト時のイベント
//
function onBlur(obj) {
  //  共通処理
  if ( obj.value == '' ) {          //  日付が入力されていない場合
    obj.style.color = 'transparent';  //  文字を透明にして表示を見えないようにする
  }

  //  
  if ( obj.id == 'create-at-start' ) {      //  開始日の場合     
      //  終了日のmin値を開始日にする
      let endObj = document.getElementById('create-at-end');
      endObj.min = obj.value;

  } else if (obj.id == 'create-at-end') {   //  終了日の場合
      //  開始日のmax値を開始日にする
      let startObj = document.getElementById('create-at-start');
      startObj.max = obj.value;

  } else {
    //  何もしない
  }
}

@endsection