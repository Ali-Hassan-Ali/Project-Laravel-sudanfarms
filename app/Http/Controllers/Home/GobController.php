<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Gob;
use Illuminate\Http\Request;

class GobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }//end of construct fun

    public function index()
    {
        $gobs = Gob::whenSearch(request()->search)->latest()->paginate(10);

        return view('home.header.gobs.index', compact('gobs'));

    } //end of index
    

    public function create()
    {
        return view('home.header.gobs.create');

    } //end of create


    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required'],
            'email'       => ['required', 'email'],
            'phone'       => ['required'],
            'count'       => ['required'],
            'description' => ['required'],
            'start_data'  => ['required'],
            'end_data'    => ['required'],
        ]);

        try {
            
            $request['user_id'] = auth()->id();

            Gob::create($request->all());

            notify()->success(__('dashboard.added_successfully'));

            return redirect()->route('gobs.index');

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }//end of store


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gob  $gob
     * @return \Illuminate\Http\Response
     */
    public function show(Gob $gob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gob  $gob
     * @return \Illuminate\Http\Response
     */
    public function edit(Gob $gob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gob  $gob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gob $gob)
    {
        $request->validate([
            'name'        => ['required'],
            'email'       => ['required', 'email'],
            'phone'       => ['required'],
            'count'       => ['required'],
            'description' => ['required'],
            'start_data'  => ['required'],
            'end_data'    => ['required'],
        ]);

        try {
            
            $request['user_id'] = auth()->id();

            Gob::create($request->all());

            notify()->success(__('dashboard.added_successfully'));

            return redirect()->route('gobs.index');

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gob  $gob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gob $gob)
    {
        //
    }
}
