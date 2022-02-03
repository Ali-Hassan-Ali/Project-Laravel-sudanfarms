<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorey;
use Illuminate\Http\Request;

class SubCategoreyController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:sub_categoreys_read'])->only('index');
        $this->middleware(['permission:sub_categoreys_create'])->only('create','store');
        $this->middleware(['permission:sub_categoreys_update'])->only('edit','update');
        $this->middleware(['permission:sub_categoreys_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $sub_categoreys = Categorey::where('sub_categoreys','>','0')->whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.sub_categoreys.index', compact('sub_categoreys'));

    }//end of index

    
    public function create()
    {
        $categoreys = Categorey::where('sub_categoreys',0)->get();

        return view('dashboard.sub_categoreys.create',compact('categoreys'));
        
    }//end of create

    
    public function store(Request $request)
    {
        
        $request->validate([
            'name_ar' => ['required','max:255'],
            'name_en' => ['required','max:255'],
            'image'   => ['required','image'],
        ]);

        try {

            $request_data = $request->except('image');

            $request_data['image'] = $request->file('image')->store('sub_categorey_images','public');

            categorey::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.sub_categoreys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit($id)
    {
        $categorey = Categorey::find($id);

        $categoreys = Categorey::where('sub_categoreys','0')->get();

        return view('dashboard.sub_categoreys.edit', compact('categorey','categoreys'));

    }//end of edit

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar'   => ['required','max:255'],
            'name_en'   => ['required','max:255'],
        ]);

        try {

            $categorey = Categorey::find($id);

            if ($request->image) {
                
                $request_data = $request->except('image');

                if ($categorey->image != 'default.png') {

                    Storage::disk('local')->delete('public/' . $categorey->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('sub_categorey_images','public');

            }//end of if
            
            $categorey->update($request_data);
            
            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.sub_categoreys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy($id)
    {
        try {

            $categorey = Categorey::find($id);

            if ($categorey->image != 'default.png') {

                Storage::disk('local')->delete('public/' . $categorey->image);

            } //end of inner if  

            $categorey->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.sub_categoreys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end pf destroy
    
}//end of controller
