<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateVillagePhysicalProgressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('village_physical_progress_edit');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exp_date_of_saturation'=>[
                'nullable','date',
            ],'exp_date_of_har_ghar_jal'=>[
                'nullable','date',
            ]
        ];
    }
}
