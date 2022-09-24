<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

/**
 * ContactController
 */
class ContactController extends Controller
{
    /**
     * get_contact
     *
     * @param  mixed $request
     * @return void
     */
    public function get_contact( Request $request )
    {
        $data = null;

        if ( $request->session()->exists('data') == true ) {    //  セッション中にキー'data'が存在する場合
            $data = $request->session()->get('data');           //  セッション中のdata取得
            $request->session()->forget('data');                //  セッション中のキー'data'削除(ページリロード時 本データを使わないようにするため)
        }

        return view('contact', ['data'=>$data]);
    }

    /**
     * post_contact
     *
     * @param  mixed $request
     * @return void
     */
    public function post_contact( ContactRequest $request )
    {
        $form = $request->all();                    //  フォームプロパティ全て取得

        $data = [
            'lastname'  => $form['lastname'],       //  氏
            'firstname' => $form['firstname'],      //  名
            'gender'    => $form['gender'],         //  性別
            'email'     => $form['email'],          //  メールアドレス
            'postcode'  => $form['postcode'],       //  郵便番号
            'address'   => $form['address'],        //  住所
            'building'  => $form['building'],       //  建物名
            'opinion'   => $form['opinion']         //  ご意見
        ];

        $request->session()->put('data', $data);    //  セッションに保存

        return redirect('contact/confirm');
    }
    
    /**
     * confirm
     *
     * @param  mixed $request
     * @return void
     */
    public function confirm(Request $request)
    {
        $data = $request->session()->get('data');

        return view('confirm', ['data'=>$data]);
    }
    
    /**
     * thanks
     *
     * @param  mixed $request
     * @return void
     */
    public function thanks(Request $request)
    {
        $data = $request->session()->get('data');
        $data['fullname'] = $data['lastname'].$data['firstname'];     //  氏名キー生成
        unset($data['lastname']);               //  氏キー削除(DB列には存在しないため)
        unset($data['firstname']);              //  名キー削除(DB列には存在しないため)

        $gender = $data['gender'];              //  性別取得( この時点では "1" or "2" の文字列)
        $data['gender'] = intval($gender);      //  性別を数値に変換

        Contact::create($data);                 //  DBにデータ追加

        $request->session()->forget('data');    //  セッション中のキー'data'削除(ページリロード時 本データを使わないようにするため)

        return view('thanks');
    }
}
