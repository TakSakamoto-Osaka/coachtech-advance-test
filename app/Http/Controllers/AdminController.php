<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * AdminController
 */
class AdminController extends Controller
{    
    /**
     * admin
     *
     * @return void
     */
    public function admin()
    {

        return view('admin');
    }
    
    /**
     * reset
     *
     * @return void
     */
    public function reset()
    {
        $page_tiele = "リセット";

        return "reset";
    }
    
    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $page_tiele = "削除";

        return "delete";
    }
}
