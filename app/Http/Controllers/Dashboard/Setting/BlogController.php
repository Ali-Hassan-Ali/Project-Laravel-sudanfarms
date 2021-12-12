<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:blogs_read'])->only('index');
        $this->middleware(['permission:blogs_create'])->only('create','store');
        $this->middleware(['permission:blogs_update'])->only('edit','update');
        $this->middleware(['permission:blogs_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {
        $blogs = Blog::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.blogs.index', compact('blogs'));

    }//end of index


    public function create()
    {
        return view('dashboard.settings.blogs.create');
        
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'title_ar'      => ['required','max:255'],
            'title_en'      => ['required','max:255'],
            'description_ar'=> ['required'],
            'description_en'=> ['required'],
            'image'         => ['required'],
        ]);

    
        try {

            $request_data = $request->except('image');

            $request_data['image']    = $request->file('image')->store('blog_images','public');
            $request_data['users_id'] = auth()->user()->id;

            Blog::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.blogs.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Blog $blog)
    {
        return view('dashboard.settings.blogs.edit',compact('blog'));
        
    }//end of edit


    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            'title_ar'      => ['required','max:255'],
            'title_en'      => ['required','max:255'],
            'description_ar'=> ['required'],
            'description_en'=> ['required'],
        ]);

         try {

            $request_data = $request->except('image');

            if ($request->image) {    

                Storage::disk('local')->delete('public/' . $blog->image);

                $request_data['image'] = $request->file('image')->store('blog_images','public');
            }

            $request_data['users_id'] = auth()->user()->id;

            $blog->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.blogs.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Blog $blog)
    {
        try {

            Storage::disk('local')->delete('public/' . $blog->image);
            
            $blog->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.blogs.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
