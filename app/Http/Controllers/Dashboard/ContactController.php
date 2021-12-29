<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReplyContact;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.contacts.index',compact('contacts'));

    }//end of index

    
    public function show(Contact $contact)
    {
        return view('dashboard.contacts.show',compact('contact'));     
           
    }//end of show

    
    public function destroy(Contact $contact)
    {
        try {

            $contact->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.contacts.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


    public function ReplyMessageIndex(Contact $contact)
    {
        $reply_contact = ReplyContact::where('contact_id',$contact->id)->get();

        return view('dashboard.contacts.reply_message',compact('contact','reply_contact'));

    }//end of contact


    public function ReplyMessage(Request $request, Contact $contact)
    {

        $data = ReplyContact::create([
            'contact_id'     => $contact->id,
            'email'          => $contact->email,
            'reply_message'  => $request->reply_message,
        ]); //end of create

        \Mail::to($contact->email)->send(new \App\Mail\ContactMail($data));
        
        session()->flash('success', __('dashboard.deleted_successfully'));
        return redirect()->route('dashboard.contacts.index');

    }//end of ReplyMessage


}//end of controller
