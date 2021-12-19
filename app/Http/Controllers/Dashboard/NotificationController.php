<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show(Request $request)
    {
        dd($request->all());

    }//end of index

}//end ofcontroller
