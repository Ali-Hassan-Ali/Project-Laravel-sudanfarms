<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:newsletters_read'])->only('index');
        $this->middleware(['permission:newsletters_create'])->only('create','store');
        $this->middleware(['permission:newsletters_update'])->only('edit','update');
        $this->middleware(['permission:newsletters_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {
        $newsletters = Newsletter::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.newsletters.index', compact('newsletters'));

    }//end of index

    
    
    public function create()
    {
        return view('dashboard.settings.newsletters.create');

    }//end of create

    

    public function store(Request $request)
    {
        $request->validate([
            'email'       => 'required|unique:newsletters',
        ]);

        try {

            Newsletter::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.newsletters.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   

    public function edit(Newsletter $newsletter)
    {
        return view('dashboard.settings.newsletters.edit', compact('newsletter'));

    }//end of edit

    

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email'       => ['required', Rule::unique('newsletters')->ignore($newsletter->id)],
        ]);

        try {

            $newsletter->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.newsletters.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Newsletter $newsletter)
    {
        try {

            $newsletter->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.newsletters.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of destroy

} //end of controller