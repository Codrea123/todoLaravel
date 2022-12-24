<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'=>[
                'int',
                'required'
            ],
            'title'=>[
                'string',
                'required'
            ],
            'description'=>[
                'string',
                'required'
            ],
            'reminder'=>[
                'date'
            ],
            'completed'=>[
                'boolean'
            ]
        ];
    }
}
