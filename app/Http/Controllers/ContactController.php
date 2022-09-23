<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function contact()
    {

        return view('contact');
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
        $page_tiele = "Thanks!";

        return "thanks";
    }
}
