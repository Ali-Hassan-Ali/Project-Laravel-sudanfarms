<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show()
    {
        $notification = Notification::find(request()->notification_id);

        if ($notification) {
            
            return redirect()->route('dashboard.'.$notification->slug. '.index');

        } else {

            return redirect()->route('dashboard.welcome');

        }//end of if

    }//end of index

}//end ofcontroller
