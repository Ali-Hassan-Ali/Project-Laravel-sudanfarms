<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currenccy;
use Illuminate\Http\Request;

class CurrenccyController extends Controller
{
    
    public function index()
    {
        $currenccys = Currenccy::whenSearch(request()->search)->latest()->paginate(20);

        return view('dashboard.currenccys.index',compact('currenccys'));

    }//end of index

    
    public function edit(Currenccy $currenccy)
    {   
        return view('dashboard.currenccys.edit',compact('currenccy'));

    }//end of edit

    
    public function update(Request $request, Currenccy $currenccy)
    {
        $request->validate([
            'amount' => 'required',
        ]);

        $currenccy->update([
            'amount' => $currenccy->amount,
        ]);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.currenccys.index');

    }//end of update

}//end of controller
