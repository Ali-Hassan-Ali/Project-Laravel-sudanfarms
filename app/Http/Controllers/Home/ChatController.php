<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\PromotedDealer;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function index()
    {
        // return Chat::all();

        $chats = Chat::where('to', request()->to)
                     ->where('from', auth()->id())
                     ->get();

        $chats_me = Chat::where('to', auth()->id())
                     ->where('from', request()->to)
                     ->get();

        $chats_me_ids = Chat::where('to', auth()->id())->pluck('from');
        $users = User::whereIn('id', $chats_me_ids)->get();

        $promoted_dealer = PromotedDealer::where('user_id', '!=', auth()->id())->get();
        $promoted        = PromotedDealer::find(request()->to);
        $seller          = PromotedDealer::where('user_id',auth()->id())->first();

        return view('home.my_acount.chats.index', compact('chats','promoted_dealer','promoted','users','seller','chats_me'));

    }//end of index


    public function store(Request $request)
    {
        request()->validate([
            'message' => ['required'],
            'to'      => ['required','numeric'],
        ]);

        Chat::create([
            'message' => $request->message,
            'to'      => $request->to,
            'from'    => auth()->id(),
            'me'      => auth()->id(),
        ]);

        return redirect()->back();

    }//end of store


}//end of controller
