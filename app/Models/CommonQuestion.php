<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['question','answer'];

    public function getQuestionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->question_ar;

        } else {

            return $this->question_ar;
            
        }//end of if

    }//end of get question

    public function getAnswerAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->answer_ar;

        } else {

            return $this->answer_ar;
            
        }//end of if

    }//end of get answer

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('question_ar' , 'like', "%$search%")
            ->orWhere('question_en', 'like', "%$search%")
            ->orWhere('answer_ar', 'like', "%$search%")
            ->orWhere('answer_en', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

}//end of model
