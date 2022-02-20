<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\NotificationUser;
use App\Models\Notification;
use App\Models\Country;
use App\Models\Package;
use App\Models\City;
use App\Models\PackagePromoted;
use App\Models\PromotedDealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotedDealerController extends Controller
{

    public function index()
    {

        $statusPackages = PromotedDealer::where('user_id', auth()->id())
                                        ->where('packages_id', '>', '0')
                                        ->where('status', '1')
                                        ->first();

        if ($statusPackages) {

            notify()->success(__('dashboard.added_successfully'));

            return redirect()->route('profile.index');

        }

        $countrys = Country::all();
        $citys    = City::where('country_id', '181')->get();

        return view('home.my_acount.promoted_dealers.index',compact('countrys','citys'));

    } //ene of index

    public function store(Request $request)
    {

        $request->validate([
            'company_name'       => ['required', 'max:255'],
            'company_logo'       => ['required'],
            'category_dealer_id' => ['required'],
            'email'              => ['required'],
            'phone_master'       => ['required', 'min:9', 'max:15'],
            'phone'              => ['required', 'min:9', 'max:15'],
            'country_id'         => ['required'],
            'city_id'            => ['required'],
            'description'        => ['required'],
            // 'other_phone'        => ['required', 'min:9', 'max:15'],
            // 'state'              => ['required'],
            // 'title'              => ['required'],
        ]);

        try {

            $this_user = PromotedDealer::where('id', auth()->id())->first();

            $request_data = $request->except('company_logo', 'company_certificate', 'user_id');

            $request_data['user_id']      = auth()->id();
            $request_data['from_inside']  = $request->country_id == 181 ? '1' : '2';
            
            $request_data['company_logo'] = $request->file('company_logo')->store('company_logo', 'public');

            if ($request->company_certificate) {

                $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate', 'public');
            }
            
            PromotedDealer::create($request_data);

            // auth()->user()->detachRole('clients');
            auth()->user()->attachRole('promoted');

            $user = Notification::create([
                'title_ar' => 'تم ترقيه حساب جديد',
                'title_en' => 'New account upgraded',
                'user_id'  => auth()->id(),
            ]); //end of create

            $user = NotificationUser::create([
                'title_ar' => 'لقد تم ترقيه حسابك ',
                'title_en' => 'Your account has been upgraded',
                'user_id'  => auth()->id(),
                'type'     => 'create_promoted_dealer',
            ]); //end of create

            // \Mail::to($request->email)->send(new \App\Mail\NotyEmail($user));

            return redirect()->route('promoted_dealers.packages');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end of store

    public function edit()
    {
        $user = PromotedDealer::where('user_id', auth()->user()->id)->first();

        return view('home.my_acount.promoted_dealers.edit', compact('user'));

    } //end of edit

    public function update(Request $request)
    {

        $request->validate([
            'company_name'       => ['required', 'max:255'],
            'category_dealer_id' => ['required'],
            'email'              => ['required'],
            'phone_master'       => ['required'],
            'phone'              => ['required'],
            'other_phone'        => ['required'],
            'country'            => ['required'],
            'city'               => ['required'],
            'title'              => ['required'],
            'description'        => ['required'],
        ]);

        try {

            $user = PromotedDealer::where('id', auth()->user()->id)->first();

            $request_data = $request->except('company_logo', 'company_certificate', 'user_id', 'state');

            $request_data['user_id'] = auth()->user()->id;

            if ($request->company_logo) {

                Storage::disk('local')->delete('public/' . $user->company_logo);

                $request_data['company_logo'] = $request->file('company_logo')->store('company_logo', 'public');

            }

            if ($request->company_certificate) {

                Storage::disk('local')->delete('public/' . $user->company_certificate);

                $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate', 'public');
            }

            $user->update($request_data);

            return redirect()->route('profile.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end of update

    public function destroy()
    {

        try {

            $user = PromotedDealer::where('id', auth()->user()->id)->first();

            Storage::disk('local')->delete('public/' . $user->company_logo);
            Storage::disk('local')->delete('public/' . $user->company_certificate);

            $user->delete();

            return redirect()->route('profile.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end pf destroy

    public function packages()
    {
        $statusPackages = PromotedDealer::where('user_id', auth()->user()->id)->where('packages_id', '>', '0')->where('status', '1')->first();

        if ($statusPackages) {

            notify()->success(__('dashboard.added_successfully'));

            return redirect()->route('profile.index');

        }

        $packages = Package::all();

        return view('home.my_acount.promoted_dealers.packages', compact('packages'));

    } //end of packages

    public function packagesStore(Request $request)
    {

        $request->validate([
            'package_id'=> ['required','numeric'],
            'image'     => ['required','image'],
        ]);

        $PromotedDealer = PromotedDealer::where('user_id', auth()->id())->first();
        $package        = Package::find($request->package_id);
        
        $request_data_user                = $request->except('image', 'package_id');
        $request_data_user['packages_id'] = $request->package_id;
        $request_data_user['status']      = '-1';

        $PromotedDealer->update($request_data_user);

        $request_data_package                       = $request->except('image', 'package_id');
        $request_data_package['promoted_dealer_id'] = $PromotedDealer->id;
        $request_data_package['package_id']         = $request->package_id;
        $request_data_package['start_month']        = now();
        $request_data_package['end_month']          = now()->addMonths($package->month);
        $request_data_package['image']              = $request->file('image')->store('promoted_dealers_images', 'public');

        PackagePromoted::create($request_data_package);

        notify()->success(__('dashboard.added_successfully'));

        return redirect()->route('profile.index');

    } //end of packagesStore


    public function packagesThisPackage()
    {

        $user     = PromotedDealer::where('user_id', auth()->id())->first();

        $packages = PackagePromoted::where('promoted_dealer_id',$user->id)->with('package')->latest()->paginate(10);

        return view('home.my_acount.promoted_dealers.this_packages', compact('packages'));

    }//end of packagesThisPackage

} //end of controller
