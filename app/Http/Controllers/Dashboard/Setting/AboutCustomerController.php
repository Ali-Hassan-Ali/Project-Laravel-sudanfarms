<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutCustomer;
use Illuminate\Http\Request;

class AboutCustomerController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:about_customers_read'])->only('index');
        $this->middleware(['permission:about_customers_create'])->only('create','store');
        $this->middleware(['permission:about_customers_update'])->only('edit','update');
        $this->middleware(['permission:about_customers_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $about_customers = AboutCustomer::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.about_customers.index', compact('about_customers'));

    }//end of index

    
    public function create()
    {
        return view('dashboard.settings.about_customers.create');
        
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'title_ar'      => ['required'],
            'title_en'      => ['required'],
            'body_ar'       => ['required'],
            'body_en'       => ['required'],
            'name'          => ['required'],
            'image'         => ['required'],
        ]);

        try {

            $request_data = $request->except('image');

            $request_data['image']    = $request->file('image')->store('about_images','public');

            AboutCustomer::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.about_customers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(AboutCustomer $aboutCustomer)
    {
        return view('dashboard.settings.about_customers.edit',compact('aboutCustomer'));
        
    }//end of edit


    public function update(Request $request, AboutCustomer $aboutCustomer)
    {

        $request->validate([
            'title_ar'      => ['required'],
            'title_en'      => ['required'],
            'body_ar'       => ['required'],
            'body_en'       => ['required'],
            'name'          => ['required'],
            'image'         => ['required'],
        ]);

        try {

            $request_data = $request->except('image');

            if ($request->image) {    

                Storage::disk('local')->delete('public/' . $aboutCustomer->image);

                $request_data['image'] = $request->file('image')->store('about_images','public');
            }

            $aboutCustomer->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.about_customers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(AboutCustomer $aboutCustomer)
    {
        try {

            Storage::disk('local')->delete('public/' . $aboutCustomer->image);
            
            $aboutCustomer->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.about_customers.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller