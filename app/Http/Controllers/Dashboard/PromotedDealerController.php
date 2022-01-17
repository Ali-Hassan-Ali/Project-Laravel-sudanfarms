<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CategoryDealer;
use App\Models\PromotedDealer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotedDealerController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:promoted_dealers_read'])->only('index');
        $this->middleware(['permission:promoted_dealers_create'])->only('create', 'store');
        $this->middleware(['permission:promoted_dealers_update'])->only('edit', 'update');
        $this->middleware(['permission:promoted_dealers_delete'])->only('destroy');
        $this->middleware(['permission:promoted_dealers_show'])->only('show');

    } //end of constructor

    public function index()
    {
        $promoted_dealers = PromotedDealer::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.promoted_dealers.index', compact('promoted_dealers'));

    } //end of index

    public function create()
    {
        $clients          = User::whereRoleIs('clients')->get();
        $category_dealers = CategoryDealer::all();

        return view('dashboard.promoted_dealers.create', compact('clients', 'category_dealers'));

    } //end of create

    public function store(Request $request)
    {


        $request->validate([
            'company_name'        => ['required', 'max:255'],
            'company_logo'        => ['required','image'],
            'category_dealer_id'  => ['required','numeric'],
            'email'               => ['required','email'],
            'phone_master'        => ['required','numeric'],
            'phone'               => ['required','numeric'],
            'other_phone'         => ['required','numeric'],
            'web_site'            => ['required'],
            'country'             => ['required'],
            'city'                => ['required'],
            'title'               => ['required'],
            'description'         => ['required'],
        ]);

        // try {

            $this_user = PromotedDealer::where('id', $request->user_id)->first();

            if (!$this_user) {

                $request_data             = $request->except(['status', 'company_logo', 'company_certificate']);
                $request_data['status']              = '1';
                $request_data['company_logo']        = $request->file('company_logo')->store('company_logo', 'public');
                $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate', 'public');

                auth()->user()->detachRole('clients');
                auth()->user()->attachRole('promoted');

                PromotedDealer::create($request_data);

                session()->flash('success', __('dashboard.added_successfully'));
                return redirect()->route('dashboard.promoted_dealers.index');

            }//end of if

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.promoted_dealers.index');

        // } catch (\Exception $e) {

        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        // }//end try

    }//end of store

    public function show(PromotedDealer $promotedDealer)
    {
        return view('dashboard.promoted_dealers.show', compact('promotedDealer'));

    }//end of show

    public function edit(PromotedDealer $promotedDealer)
    {
        $clients          = User::whereRoleIs('clients')->get();
        $category_dealers = CategoryDealer::all();

        return view('dashboard.promoted_dealers.edit', compact('promotedDealer', 'clients', 'category_dealers'));

    }//end of edit

    public function update(Request $request, PromotedDealer $promotedDealer)
    {
        $request->validate([
            'company_name'        => ['required', 'max:255'],
            'category_dealer_id'  => ['required','numeric'],
            'email'               => ['required','email'],
            'phone_master'        => ['required','numeric'],
            'phone'               => ['required','numeric'],
            'other_phone'         => ['required','numeric'],
            'web_site'            => ['required'],
            'country'             => ['required'],
            'city'                => ['required'],
            'title'               => ['required'],
            'description'         => ['required'],
        ]);

        try {

            $request_data = $request->except('company_logo', 'company_certificate', 'user_id');

            if ($request->company_logo) {

                Storage::disk('local')->delete('public/' . $promotedDealer->company_logo);
                $request_data['company_logo'] = $request->file('company_logo')->store('company_logo', 'public');

            }

            if ($request->company_certificate) {

                Storage::disk('local')->delete('public/' . $promotedDealer->company_certificate);
                $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate', 'public');
            }

            $this_user = PromotedDealer::where('id', auth()->user()->id)->first();

            $request_data['user_id'] = auth()->user()->id;

            $promotedDealer->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.promoted_dealers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    public function destroy(PromotedDealer $promotedDealer)
    {
        try {

            Storage::disk('local')->delete('public/' . $promotedDealer->company_logo);
            Storage::disk('local')->delete('public/' . $promotedDealer->company_certificate);

            $promotedDealer->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.promoted_dealers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end pf destroy

    public function status(PromotedDealer $promotedDealer)
    {
        $promotedDealer->update([
            'status' => $promotedDealer->status == 1 ? 0 : 1,
        ]);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.promoted_dealers.index');

    }//end of status

}//end of controller
