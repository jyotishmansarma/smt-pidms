<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreClfActivitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      
        return Gate::allows('clf_activities_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'division_id'=>[
                'required','int',
            ],'proposed_villages'=>[
                'required','int',
            ],'actually_alloted_village'=>[
                'required','int',
            ],'clf_alloted'=>[
                'required','int',
            ],'is_training_conducted'=>[
                'required','int',
            ],'water_user_committee'=>[
                'required','int',
            ],'water_user_committee_bank_ac'=>[
                'required','int',
            ],'hh_ipc_done'=>[
                'required','int',
            ],'skilled_manpower_listed'=>[
                'required','int',
            ],
            'issued_date'=>[
                'required','date',
            ],
            'remarks'=>[
                'required','string',
            ],
            
        ];
    }
}
