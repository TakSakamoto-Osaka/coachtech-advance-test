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
    public function get_contact( Request $request)
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
        return redirect('contact/confirm');
    }

    /**
     * confirm
     *
     * @return void
     */
    public function confirm()
    {
        return view('confirm');
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
