<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:advertisements_read'])->only('index');
        $this->middleware(['permission:advertisements_create'])->only('create','store');
        $this->middleware(['permission:advertisements_update'])->only('edit','update');
        $this->middleware(['permission:advertisements_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {   
        $advertisements = Advertisement::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.advertisements.index', compact('advertisements'));

    }//end of index



    public function edit(Advertisement $advertisement)
    {
        return view('dashboard.settings.advertisements.edit', compact('advertisement'));

    }//end of edit



    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'title_ar'       => ['required'],
            'title_en'       => ['required'],
        ]);

    
        try {

            $request_data = $request->except('image');

            if ($request->image) {    

                if ($advertisement->image != 'advertisement_images/default.png') {
                    
                    Storage::disk('local')->delete('public/' . $advertisement->image);
                }

                $request_data['image'] = $request->file('image')->store('advertisement_images','public');
            }

            $advertisement->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.advertisements.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

}//end of controller
