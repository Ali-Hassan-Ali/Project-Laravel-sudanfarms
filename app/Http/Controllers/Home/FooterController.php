<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function ManagerWord()
    {
        return view('home.footer.manager_word');

    }//end of ManagerWord

}//end of controller
