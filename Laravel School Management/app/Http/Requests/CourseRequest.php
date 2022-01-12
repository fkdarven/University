<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|min:5|max:30',
            'total_time' => 'numeric|min:15|max:200',
            'max_students'=> 'numeric|max:100|min:10',
            'description' => 'required|min:10|max:300',
        ];
    }
}
