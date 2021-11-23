<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:files_read'])->only('index');
        $this->middleware(['permission:files_create'])->only('create','store');
        $this->middleware(['permission:files_update'])->only('edit','update');
        $this->middleware(['permission:files_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $files = File::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.files.index', compact('files'));
    }//end of index


    public function create()
    {
        return view('dashboard.settings.files.create');
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'title_ar'  => ['required','max:200'],
            'title_en'  => ['required','max:200'],
            'file_files'=> ['required'],
        ]);

        try {
            
            $request_data = $request->except('file_files');

            $request_data['file_files'] = $request->file('file_files')->store('file_files','public');

            File::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.files.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(File $file)
    {
        return view('dashboard.settings.files.edit',compact('file'));
    }//end of edit


    public function update(Request $request, File $file)
    {

        $request->validate([
            'title_ar'  => ['required','max:200'],
            'title_en'  => ['required','max:200'],
        ]);

        try {

            $request_data = $request->except('file_files');

            if ($request->file_files) {    

                Storage::disk('local')->delete('public/' . $file->file_files);

                $request_data['file_files'] = $request->file('file_files')->store('file_files','public');
            }

            $file->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.files.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(File $file)
    {
        try {

            Storage::disk('local')->delete('public/' . $file->file_files);
            
            $file->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.files.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end of controller
