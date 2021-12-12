<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:video_categorys_read'])->only('index');
        $this->middleware(['permission:video_categorys_create'])->only('create','store');
        $this->middleware(['permission:video_categorys_update'])->only('edit','update');
        $this->middleware(['permission:video_categorys_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $video_categorys = VideoCategory::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.video_categorys.index', compact('video_categorys'));

    }//end of index

    
    public function create()
    {
        return view('dashboard.settings.video_categorys.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'       => ['required','max:15'],
            'name_en'       => ['required','max:15'],
        ]);

    
        try {

            VideoCategory::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.video_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit(VideoCategory $videoCategory)
    {
        return view('dashboard.settings.video_categorys.edit',compact('videoCategory'));

    }//end of edit

    
    public function update(Request $request, VideoCategory $videoCategory)
    {
        $request->validate([
            'name_ar'       => ['required','max:15'],
            'name_en'       => ['required','max:15'],
        ]);

    
        try {

            $videoCategory->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.video_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(VideoCategory $videoCategory)
    {
        try {
            
            $videoCategory->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.video_categorys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
