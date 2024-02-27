<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('scheme_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'completed_schemes'=>[
                'required','int',
            ],'district_id'=>[
                'required','int',
            ],'division_id'=>[
                'required','int',
            ],'fhtc_in_completed_schemes'=>[
                'nullable','int',
            ],'completed_schemes_handed_pri'=>[
                'nullable','int',
            ],'balance_schemes_handed_pri'=>[
                'nullable','int',
            ],'wuc_formed_againts_completed_schemes'=>[
                'nullable','int',
            ],'wuc_not_formed_againts_completed_schemes'=>[
                'nullable','int',
            ],'no_of_jal_mitra_trained'=>[
                'nullable','int',
            ],'no_of_jal_mitra_eng_letter'=>[
                'nullable','int',
            ]
        ];
    }
}
