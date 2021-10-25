<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;

class ClientsController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:clients_read'])->only('index');
        $this->middleware(['permission:clients_create'])->only('create','store');
        $this->middleware(['permission:clients_update'])->only('edit','update');
        $this->middleware(['permission:clients_delete'])->only('destroy');

    } //end of constructor

    public function index(Request $request)
    {

        $clients = User::whereRoleIs('clients')->whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.clients.index', compact('clients'));

    } //end of index

    public function create()
    {
        return view('dashboard.clients.create');

    } //end of create

    public function store(Request $request)
    {

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => 'required|unique:users',
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'password'    => 'required',
            'username'    => 'required',
            'phone'       => 'required',
            'country'     => 'required',
            'city'        => 'required',
            'title'       => 'required',
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/user_images/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of if

            $user = User::create($request_data);
            
            $user->attachRole('clients');

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of store

    public function edit($id)
    {   
        $client = User::find($id);
        
        return view('dashboard.clients.edit', compact('client'));

    } //end of edit

    public function update(Request $request, $id)
    {   

        
        $client = User::find($id);

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($client->id)],
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'username'    => 'required',
            'phone'       => 'required',
            'country'     => 'required',
            'city'        => 'required',
            'title'       => 'required',
        ]);


        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($client->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/user_images/' . $client->image);

                } //end of inner if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('uploads/user_images/' . $request->image->hashName());

                $request_data['image'] = $request->image->hashName();

            } //end of external if

            $client->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of update

    public function destroy($id)
    {

        try {

            $client = User::find($id);

            if ($client->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $client->image);

            }//end of if

            $client->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.clients.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of destroy

}//end of controller
