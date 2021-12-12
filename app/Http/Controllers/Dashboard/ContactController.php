<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

}//end of controller
