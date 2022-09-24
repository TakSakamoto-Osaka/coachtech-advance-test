<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

/**
 * ContactController
 */
class ContactController extends Controller
{    
    /**
     * contact
     *
     * @return void
     */
    public function get_contact( Request $request )
    {
        return view('contact');
    }

    /**
     * send
     *
     * @param  mixed $request
     * @return void
     */
    public function post_contact( ContactRequest $request )
    {
        $form = $request->all();        //  フォームプロパティ全て取得
        unset($form['_token']);         //  _token削除

        return redirect('contact/confirm')->with(['form'=>$form]);
    }

    /**
     * confirm
     *
     * @return void
     */
    public function confirm()
    {
        $data = session('form');

        return view('confirm', ['data'=>$data]);
    }
    
    /**
     * thanks
     *
     * @return void
     */
    public function thanks()
    {

        return view('thanks');
    }
}
