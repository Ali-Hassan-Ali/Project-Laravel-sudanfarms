<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Send;
use Illuminate\Http\Request;

class SendController extends Controller
{
    
    public function index()
    {
        $sends = Send::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.sends.index', compact('sends'));

    }//end of index

    
    public function create()
    {
        return view('dashboard.sends.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required'],
        ]);
        
        try {

            Send::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.sends.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of store


    public function show(Send $send)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function edit(Send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function destroy(Send $send)
    {
        try {

            $send->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.sends.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of destroy

}//end of controller
