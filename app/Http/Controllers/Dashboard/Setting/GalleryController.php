<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:gallerys_read'])->only('index');
        $this->middleware(['permission:gallerys_create'])->only('create','store');
        $this->middleware(['permission:gallerys_update'])->only('edit','update');
        $this->middleware(['permission:gallerys_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $gallerys = Gallery::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.gallerys.index', compact('gallerys'));

    }//end of index

    
    public function create()
    {
        $gallery_categorys = GalleryCategory::all();

        return view('dashboard.settings.gallerys.create',compact('gallery_categorys'));
        
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'       => ['required','max:30'],
            'name_en'       => ['required','max:30'],
            'image'         => ['required'],
        ]);

    
        try {
            
            $request_data = $request->except('image');

            $request_data['image'] = $request->file('image')->store('gallery_images','public');

            Gallery::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit(Gallery $gallery)
    {
        $gallery_categorys = GalleryCategory::all();

        return view('dashboard.settings.gallerys.edit',compact('gallery','gallery_categorys'));

    }//end of edit

    
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name_ar'       => ['required','max:30'],
            'name_en'       => ['required','max:30'],
        ]);

    
        try {

            $request_data = $request->except('image');

            if ($request->image) {    

                Storage::disk('local')->delete('public/' . $gallery->image);

                $request_data['image'] = $request->file('image')->store('gallery_images','public');
            }

            $gallery->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Gallery $gallery)
    {

         try {

            Storage::disk('local')->delete('public/' . $gallery->image);
            
            $gallery->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.gallerys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of model
