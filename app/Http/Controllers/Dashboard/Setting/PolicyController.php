<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:policys_read'])->only('index');
        $this->middleware(['permission:policys_create'])->only('create','store');
        $this->middleware(['permission:policys_update'])->only('edit','update');
        $this->middleware(['permission:policys_delete'])->only('destroy');

    }//end of constructor



    public function create()
    {
        return view('dashboard.settings.policys.create');
        
    }//end of create



    public function store(Request $request)
    {
        $request->validate([
            'title_ar'       => ['required'],
            'title_en'       => ['required'],
            'body_ar'        => ['required'],
            'body_en'        => ['required'],
        ]);

        try {

            Policy::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));

            return redirect()->route('dashboard.settings.'.$request->guard.'.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store



    public function edit(Policy $policy)
    {
        return view('dashboard.settings.policys.edit', compact('policy'));

    }//end of edit


    public function update(Request $request, Policy $policy)
    {
        $request->validate([
            'title_ar'       => ['required'],
            'title_en'       => ['required'],
            'body_ar'        => ['required'],
            'body_en'        => ['required'],
        ]);

        try {

            $policy->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.'.$request->guard.'.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try


    }//end of update


    
    public function destroy(Policy $policy)
    {
        try {

            $policy->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            
            return redirect()->route('dashboard.settings.'.$policy->guard.'.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of destroy


    public function copyrights()
    {
        $policys = Policy::whenSearch(request()->search)->where('guard','copyrights')->latest()->paginate(10);

        return view('dashboard.settings.policys.copyrights.index', compact('policys'));

    }//end of copyrights


    public function privacys()
    {
        $policys = Policy::whenSearch(request()->search)->where('guard','privacys')->latest()->paginate(10);

        return view('dashboard.settings.policys.privacys.index', compact('policys'));

    }//end of privacys


    public function terms_conditions()
    {
        $policys = Policy::whenSearch(request()->search)->where('guard','terms_conditions')->latest()->paginate(10);

        return view('dashboard.settings.policys.terms_conditions.index', compact('policys'));

    }//end of terms conditions
    

    public function evacuation_responsibilatys()
    {
        $policys = Policy::whenSearch(request()->search)->where('guard','evacuation_responsibilatys')->latest()->paginate(10);

        return view('dashboard.settings.policys.evacuation_responsibilatys.index', compact('policys'));

    }//end of evacuation responsibilatys
    

} //end of controller