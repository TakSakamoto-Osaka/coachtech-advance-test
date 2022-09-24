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
<form action="" method="post" class="admin">
  <div class="search-condition">
    <div class="input-elm">
      <!-- お名前 -->
      <label for="fullname" id="search-name">お名前</label>
      <input type="text" id="fullname" class="search-text search-fullname" name="fullname">

      <!-- 性別 -->
      <label class="gender">性別</label>
      <div class="gender">
        <div class="gender-radio rdb-gender-offset">
          <input type="radio" id="all" name="gender" value="0" checked />
          <label for="all" class="all-gender">全て</label>
          <input type="radio" id="male" name="gender" value="1" />
          <label for="male" class="male">男性</label>
          <input type="radio" id="female" name="gender" value="2" />
          <label for="female" class="female">女性</label>
        </div>
      </div>
    </div>

    <!-- 登録日 -->
    <div class="input-elm">
      <label for="create-at-start" class="create-at">登録日</label>
      <input type="date" id="create-at-start" onfocus="onFocus(this)" onblur="onBlur(this)" name="create-at-start">
      <span class="range">〜</span>
      <input type="date" id="create-at-end"  onfocus="onFocus(this)" onblur="onBlur(this)" name="create-at-end">
    </div>

    <div class="input-elm">
      <!-- メールアドレス -->
      <label for="email">メールアドレス</label>
      <input type="text" id="email" class="search-text" name="email">
    </div>


  <!-- 検索 -->
  <div class="btn-wrap btn-search">
    <button>検索</button>
    <a href="" class="block">リセット</a>
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
    <tr class="contact">
      <td class="id">1</td>
      <td class="name">山田太郎</td>
      <td class="gender">男性</td>
      <td class="email">test@example.com</td>
      <td class="opinion tooltip">いつもお世話になっております。先日、貴社製品を購入‥
        <span class="description">
          いつもお世話になっております。先日、貴社製品を購入しております者です。<br>
          スッキリわかる日商簿記３級<br>
        </span>
      </td>
      <td class="delete"><a href="" class="delete">削除</a></td>
    </tr>
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
    element.style.color = 'transparent';
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