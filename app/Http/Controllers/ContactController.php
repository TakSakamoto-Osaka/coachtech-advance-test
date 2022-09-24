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
     * get_contact
     *
     * @param  mixed $request
     * @return void
     */
    public function get_contact( Request $request )
    {
        $data = null;

        if ( $request->session()->exists('data') == true ) {
            $data = $request->session()->get('data');
            $request->session()->forget('data');
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
            'lastname'  => $form['lastname'],
            'firstname' => $form['firstname'],
            'gender'    => $form['gender'],
            'email'     => $form['email'],
            'postcode'  => $form['postcode'],
            'address'   => $form['address'],
            'building'  => $form['building'],
            'opinion'   => $form['opinion']
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
     * @return void
     */
    public function thanks()
    {

        return view('thanks');
    }
}
