<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\PromotedDealer;
use Illuminate\Support\Facades\Storage;

class PromotedDealerController extends Controller
{
    public function index()
    {
        return view('home.my_acount.promoted_dealers.index');

    }//ene of index

    

    public function store(Request $request)
    {
            $request->validate([
                'company_name_ar'     => ['required','max:255'],
                'company_name_en'     => ['required','max:255'],
                'company_logo'        => ['required'],
                'company_certificate' => ['required'],
                'category_dealer_id'  => ['required'],
                'email'               => ['required'],
                'phone_master'        => ['required'],
                'phone'               => ['required'],
                'other_phone'         => ['required'],
                'web_site'            => ['required'],
                'country'             => ['required'],
                'state'               => ['required'],
                'city'                => ['required'],
                'title'               => ['required'],
                'description'         => ['required'],
            ]);

        try {


            $this_user    = PromotedDealer::where('id',auth()->user()->id)->first();

            $request_data = $request->except('company_logo','company_certificate','user_id');

            $request_data['user_id']             = auth()->user()->id;
            $request_data['company_logo']        = $request->file('company_logo')->store('company_logo','public');

            $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate','public');
            
            PromotedDealer::create($request_data);

            $user = Notification::create([
                'title_ar' => 'تم ترقيه حساب جديد',
                'title_en' => 'New account upgraded',
                'user_id'  => auth()->user()->id,
            ]);//end of create

            \Mail::to($request->email)->send(new \App\Mail\NotyEmail($user));

            return redirect()->route('profile.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store




    public function edit()
    {
        $user = PromotedDealer::where('user_id',auth()->user()->id)->first();

        return view('home.my_acount.promoted_dealers.edit',compact('user'));

    }//end of edit



    public function update(Request $request)
    {   
   
        $request->validate([
            'company_name_ar'     => ['required','max:255'],
            'company_name_en'     => ['required','max:255'],
            'category_dealer_id'  => ['required'],
            'email'               => ['required'],
            'phone_master'        => ['required'],
            'phone'               => ['required'],
            'other_phone'         => ['required'],
            'web_site'            => ['required'],
            'country'             => ['required'],
            'city'                => ['required'],
            'title'               => ['required'],
            'description'         => ['required'],
        ]);

        try {

            $user    = PromotedDealer::where('id',auth()->user()->id)->first();

            $request_data = $request->except('company_logo','company_certificate','user_id','state');

            $request_data['user_id'] = auth()->user()->id;

            if ($request->company_logo) {

                Storage::disk('local')->delete('public/' . $user->company_logo);

                $request_data['company_logo']        = $request->file('company_logo')->store('company_logo','public');
                
            }

            if ($request->company_certificate) {

                Storage::disk('local')->delete('public/' . $user->company_certificate);
                
                $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate','public');
            }

            $user->update($request_data);

            return redirect()->route('profile.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update



    public function destroy()
    {

        try {

            $user    = PromotedDealer::where('id',auth()->user()->id)->first();
            
            Storage::disk('local')->delete('public/' . $user->company_logo);
            Storage::disk('local')->delete('public/' . $user->company_certificate);
            
            $user->delete();

            return redirect()->route('profile.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end pf destroy


}//end of controller
