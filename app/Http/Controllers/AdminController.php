<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

/**
 * AdminController
 */
class AdminController extends Controller
{    
    
    /**
     * admin
     *
     * @param  mixed $request
     * @return void
     */
    public function admin( Request $request )
    {
        //  検索条件をセッションから取得
        if ( $request->session()->exists('search') == true ) {    //  セッション中にキー'search'が存在する場合
            $search = $request->session()->get('search');           //  セッション中のdata取得
        } else {
            $search = [
                'fullname'        => '',        //  氏名
                'gender'          => 0,         //  性別
                'create-at-start' => '',        //  登録日[開始日]
                'create-at-end'   => '',        //  登録日[終了日]
                'email'           => ''         //  メールアドレス
            ];
        }

        //  1ページの表示件数
        $page_max_num = 10;

        //  ページネーションのページ番号をURLのパラメータ'page'から取得
        $page = 1;
        if ( $request->has('page') ) {
            $page = intval( $request->page );
        }

        //  クエリー生成
        $query = Contact::query();

        //  お名前 部分一致
        $query->where('fullname', 'like', "%{$search['fullname']}%" );

        //  性別
        if ( $search['gender'] > 0 ) {      //  男性 or 女性が指定されている
            $query->where('gender', $search['gender'] );
        }

        //  登録日
        if ( $search['create-at-start'] != "" ) {   //  登録日[開始日]が指定されている
            $create_at_start = $search['create-at-start'];
            $query->where('created_at', '>=', $create_at_start );
        }

        if ( $search['create-at-end'] != "" ) {     //  登録日[終了日]が指定されている
            $create_at_end = date("Y-m-d", strtotime("{$search['create-at-end']} +1 day"));
            $query->where('created_at', '<', $create_at_end );
        }

        //  メールアドレス 部分一致
        $query->where('email', 'like', "%{$search['email']}%" );

        $data  = $query->get();

        //  ページネーション処理
        $contacts = $query->paginate($page_max_num);    //  10件ずつ表示

        //  指定ページのデータが存在しない場合の処理 : データが存在する最終ページ
        if ( $page > 1 ) {                              //  2ページ目以降
            $view_num = $page_max_num * $page;          //  表示ページまでの件数
            $q_num    = count( $data );                 //  クエリー結果件数

            if ( $view_num > $q_num ) {                 //  最終ページ 又は ページが行きすぎている場合
                if ( ( $q_num % $page_max_num ) == 0 ) {
                    $page = floor($q_num / $page_max_num);
                } else {
                    $page = ceil($q_num / $page_max_num);
                }

                if ( $page < intval( $request->page ) ) {
                    return redirect("/admin?page={$page}");
                }
            }
        }

        return view('admin', ['contacts'=>$contacts, 'page'=>$page, 'search'=>$search]);
    }

    
    /**
     * search
     *
     * @param  mixed $request
     * @return void
     */
    public function search( Request $request )
    {
        $form = $request->all();                    //  フォームプロパティ全て取得

        $search = [
            'fullname'        => $form['fullname'],             //  氏名
            'gender'          => intval( $form['gender'] ),     //  性別
            'create-at-start' => $form['create-at-start'],      //  登録日[開始日]
            'create-at-end'   => $form['create-at-end'],        //  登録日[終了日]
            'email'           => $form['email']                 //  メールアドレス
        ];

        $request->session()->put('search', $search);            //  検索条件をセッションに保存

        return redirect("/admin?page={$request->page}");
    }
    
    /**
     * reset
     *
     * @param  mixed $request
     * @return void
     */
    public function reset( Request $request )
    {
        $request->session()->forget('search');    //  セッション中のキー'search'削除

        return redirect("/admin?page={$request->page}");
    }
    
    /**
     * delete
     *
     * @param  mixed $request
     * @return void
     */
    public function delete( Request $request )
    {
        $id_del = intval( $request->id );           //  指定された削除するデータのID
        Contact::find($id_del)->delete();            //  データ削除

        return redirect("/admin?page={$request->page}");
    }
}
