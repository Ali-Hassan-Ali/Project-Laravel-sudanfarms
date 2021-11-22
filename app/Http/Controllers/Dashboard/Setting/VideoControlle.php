<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoControlle extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:videos_read'])->only('index');
        $this->middleware(['permission:videos_create'])->only('create','store');
        $this->middleware(['permission:videos_update'])->only('edit','update');
        $this->middleware(['permission:videos_delete'])->only('destroy');

    }//end of constructor

   
    public function index()
    {
        $videos = Video::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.videos.index', compact('videos'));
    }//end of index


    public function create()
    {
        $video_categorys = VideoCategory::all();

        return view('dashboard.settings.videos.create',compact('video_categorys'));

    }//end of create

  
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'       => ['required','max:30'],
            'name_en'       => ['required','max:30'],
            'video_url'     => ['required'],
        ]);

        
        try {

            Video::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.videos.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit(Video $video)
    {
        $video_categorys = VideoCategory::all();

        return view('dashboard.settings.videos.edit',compact('video','video_categorys'));
    }

    
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'name_ar'       => ['required','max:30'],
            'name_en'       => ['required','max:30'],
            'video_url'     => ['required'],
        ]);

        try {

            $video->update($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.videos.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Video $video)
    {
        try {
            
            $video->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.videos.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end of controller
