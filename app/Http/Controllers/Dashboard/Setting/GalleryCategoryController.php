<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:gallery_categorys_read'])->only('index');
        $this->middleware(['permission:gallery_categorys_create'])->only('create','store');
        $this->middleware(['permission:gallery_categorys_update'])->only('edit','update');
        $this->middleware(['permission:gallery_categorys_delete'])->only('destroy');

    }//end of constructor
    

    public function index()
    {
        $gallery_categorys = GalleryCategory::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.gallery_categorys.index', compact('gallery_categorys'));

    }//end of index


    public function create()
    {
        return view('dashboard.settings.gallery_categorys.create');

    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'name_ar'       => ['required','max:15'],
            'name_en'       => ['required','max:15'],
        ]);

    
        try {

            GalleryCategory::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            
            return redirect()->route('dashboard.settings.gallery_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(GalleryCategory $galleryCategory)
    {
        return view('dashboard.settings.gallery_categorys.edit',compact('galleryCategory'));
        
    }//end of edit


    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name_ar'       => ['required','max:15'],
            'name_en'       => ['required','max:15'],
        ]);

    
        try {

            $galleryCategory->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.gallery_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(GalleryCategory $galleryCategory)
    {
        try {
            
            $galleryCategory->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.gallery_categorys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of contoller
