<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:units_read'])->only('index');
        $this->middleware(['permission:units_create'])->only('create','store');
        $this->middleware(['permission:units_update'])->only('edit','update');
        $this->middleware(['permission:units_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $units = Unit::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.units.index', compact('units'));

    }//end of index

    
    public function create()
    {
        return view('dashboard.settings.units.create');
        
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'name_ar'      => ['required'],
            'name_en'      => ['required'],
        ]);

        try {

            Unit::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.units.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Unit $unit)
    {
        return view('dashboard.settings.units.edit',compact('unit'));
        
    }//end of edit


    public function update(Request $request, Unit $unit)
    {

        $request->validate([
            'name_ar'      => ['required'],
            'name_en'      => ['required'],
        ]);

        try {

            $unit->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.units.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Unit $unit)
    {
        try {
            
            $unit->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.units.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller