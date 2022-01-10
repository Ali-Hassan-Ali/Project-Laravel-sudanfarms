<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PriceTable;
use Illuminate\Http\Request;

class PriceTableController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:price_tables_read'])->only('index');
        $this->middleware(['permission:price_tables_create'])->only('create');
        $this->middleware(['permission:price_tables_update'])->only('edit');
        $this->middleware(['permission:price_tables_delete'])->only('destroy');

    } //end of constructor


    public function index()
    {
        $price_tables = PriceTable::whenSearch(request()->search)->latest()->paginate(10);
        
        return view('dashboard.price_tables.index',compact('price_tables'));

    }//end of model
    
    
    public function create()
    {
        return view('dashboard.price_tables.create');

    }//end of create

    
    
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'  => ['required'],
            'name_en'  => ['required'],
            'title_ar' => ['required'],
            'title_en' => ['required'],
            'price'    => ['required'],
        ]);

        try {

            PriceTable::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.price_tables.index');
            
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try

    }//end of store


    public function edit(PriceTable $priceTable)
    {
        return view('dashboard.price_tables.edit',compact('priceTable'));

    }//end of edit


    public function update(Request $request, PriceTable $priceTable)
    {
        $request->validate([
            'title_ar' => ['required'],
            'title_en' => ['required'],
            'name_ar'  => ['required'],
            'name_en'  => ['required'],
            'price'    => ['required'],
        ]);

        try {

            $priceTable->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.price_tables.index');
            
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try

    }//end of update


    public function destroy(PriceTable $priceTable)
    {
        try {

            $priceTable->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.price_tables.index');
            
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try

    }//end of destroy

}//end of controller
