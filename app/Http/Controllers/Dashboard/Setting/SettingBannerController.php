<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\SettingBanner;
use Illuminate\Http\Request;

class SettingBannerController extends Controller
{


    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:settings_read'])->only('index');
        $this->middleware(['permission:settings_create'])->only('create','store');
        $this->middleware(['permission:settings_update'])->only('edit','update');
        $this->middleware(['permission:settings_delete'])->only('destroy');

    }//end of constructor


    
    public function index()
    {
        $setting_banners = SettingBanner::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.setting_banners.index', compact('setting_banners'));

    }//end of index



    
    public function create()
    {
        return view('dashboard.settings.setting_banners.create');

    }//end of create

    
    
    
    public function store(Request $request)
    {
        $request->validate([
            'image'          => ['required'],
            'title_ar'       => ['required','max:15'],
            'title_en'       => ['required','max:15'],
            'description_ar' => ['required','max:255'],
            'description_en' => ['required','max:255']
        ]);

    
        try {

            $request_data = $request->except('image');

            $request_data['image'] = $request->file('image')->store('banner_images','public');

            SettingBanner::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.setting_banners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    

    public function show(SettingBanner $settingBanner)
    {
        //
    }//end of show

    


    public function edit(SettingBanner $settingBanner)
    {
        return view('dashboard.settings.setting_banners.edit', compact('settingBanner'));
    }

    


    public function update(Request $request, SettingBanner $settingBanner)
    {
        $request->validate([
            'title_ar'       => ['required','max:15'],
            'title_en'       => ['required','max:15'],
            'description_ar' => ['required','max:255'],
            'description_en' => ['required','max:255']
        ]);

        try {

            $request_data = $request->except('image');

            if ($request->image) {
                
                Storage::disk('local')->delete('public/' . $settingBanner->image);

                $request_data['image'] = $request->file('image')->store('banner_images','public');
            }


            $settingBanner->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.setting_banners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    


    public function destroy(SettingBanner $settingBanner)
    {
        try {
            
            Storage::disk('local')->delete('public/' . $settingBanner->image);
            
            $settingBanner->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.setting_banners.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end if destroy


}//end of controller
