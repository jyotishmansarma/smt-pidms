<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class LandFinalizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('land_finalization_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
        'district_id'=>[
            'required','int',
        ],'division_id'=>[
            'required','int',
        ],'sanctioned_schemes'=>[
            'nullable','int',
        ],'no_of_schemes_district_aa'=>[
            'nullable','int',
        ],'aa_obtained_district_aa'=>[
            'nullable','int',
        ],'balance_aa'=>[
            'nullable','int',
        ],'land_finalized'=>[
            'nullable','int',
        ],'balance_for_land_finalized'=>[
            'nullable','int',
        ]
    ];
    }
}
