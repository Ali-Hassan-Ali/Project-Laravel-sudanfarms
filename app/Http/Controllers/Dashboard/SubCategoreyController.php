<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        $sub_categoreys = Categorey::where('sub_categoreys','1')->whenSearch(request()->search)->latest()->paginate(10);

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
            'name_en' => ['required','max:255']
        ]);

        try {

            $request['sub_categoreys'] = '1';

            categorey::create($request->all());

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

    
    public function update(Request $request, Categorey $categorey)
    {
        
        $request->validate([
            'name_ar'   => ['required','max:255'],
            'name_en'   => ['required','max:255'],
        ]);

        try {

            $request['sub_categoreys'] = '1';
            
            $categorey->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.sub_categoreys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Categorey $categorey)
    {
        try {

            $categorey->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.sub_categoreys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end pf destroy
    
}//end of controller
