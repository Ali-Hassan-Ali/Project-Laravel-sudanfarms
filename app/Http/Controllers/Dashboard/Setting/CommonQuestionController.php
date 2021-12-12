<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion;
use Illuminate\Http\Request;

class CommonQuestionController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:common_questions_read'])->only('index');
        $this->middleware(['permission:common_questions_create'])->only('create','store');
        $this->middleware(['permission:common_questions_update'])->only('edit','update');
        $this->middleware(['permission:common_questions_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $common_questions = CommonQuestion::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.settings.common_questions.index', compact('common_questions'));

    }//end of index


    public function create()
    {
        return view('dashboard.settings.common_questions.create');

    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'question_ar'  => ['required','max:255'],
            'question_en'  => ['required','max:255'],
            'answer_ar'    => ['required'],
            'answer_en'    => ['required'],
        ]);

    
        try {

            CommonQuestion::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.settings.common_questions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store



    public function edit(CommonQuestion $commonQuestion)
    {
        return view('dashboard.settings.common_questions.edit',compact('commonQuestion'));
        
    }//end of edit


    public function update(Request $request, CommonQuestion $commonQuestion)
    {
        $request->validate([
            'question_ar'  => ['required','max:255'],
            'question_en'  => ['required','max:255'],
            'answer_ar'    => ['required'],
            'answer_en'    => ['required'],
        ]);

    
        try {

            $commonQuestion->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.settings.common_questions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }


    public function destroy(CommonQuestion $commonQuestion)
    {
        try {
            
            $commonQuestion->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.common_questions.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of contoller
