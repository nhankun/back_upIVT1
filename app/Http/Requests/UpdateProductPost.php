<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->user_type == User::USER_ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,'.$this->id.'|max:255',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'quantily' => 'required|numeric',

            'screen' => 'nullable|max:255',
            'os' => 'nullable|max:255',
            'camera' => 'nullable|max:255',
            'font_camera' => 'nullable|max:255',
            'cpu' => 'nullable|max:255',
            'gpu' => 'nullable|max:255',
            'ram' => 'nullable|max:255',
            'memory' => 'nullable|max:255',
            'sim' => 'nullable|max:255',
            'Battery_capacity' => 'nullable|max:255',
            'describe' => 'nullable'
        ];
    }
}
