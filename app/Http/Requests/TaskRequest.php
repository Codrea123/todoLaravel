<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::requiredIf(function () {
                    return $this->get('toggle') == null;
                })
            ],
            'title'=>[
                'string',
                Rule::requiredIf(function () {
                    return $this->get('toggle') == null;
                })
            ],
            'description'=>[
                'string',
                Rule::requiredIf(function () {
                    return $this->get('toggle') == null;
                })
            ],
            'category_id'=>[
                'int',
                'nullable',
            ],
            'reminder'=>[
                'date',
            ],
            'completed'=>[
                'boolean',
            ]
        ];
    }
}
