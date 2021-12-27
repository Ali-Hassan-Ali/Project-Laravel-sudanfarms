<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:packages_read'])->only('index');
        $this->middleware(['permission:packages_create'])->only('create','store');
        $this->middleware(['permission:packages_update'])->only('edit','update');
        $this->middleware(['permission:packages_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $packages = Package::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.packages.index', compact('packages'));

    } //end of index


    public function create()
    {
        return view('dashboard.packages.create');

    } //end of create


    public function store(Request $request)
    {

        $request->validate([
            'guard'       => 'required',
            'price'       => 'required',
            'month'       => 'required',
            'qty_product' => 'required',
        ]);

        try {

            Package::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.packages.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Package $package)
    {
        return view('dashboard.packages.edit',compact('package'));

    }//end of edit

    public function update(Request $request, Package $package)
    {
        
        $request->validate([
            'guard'       => 'required',
            'price'       => 'required',
            'month'       => 'required',
            'qty_product' => 'required',
        ]);

        try {

            $package->update($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.packages.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    public function destroy(Package $package)
    {
        try {

            $package->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.packages.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end pf destroy

}//end ofcontroller
