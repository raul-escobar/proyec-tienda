<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'nombre'=>'required|max:200',
            'detalle'=>'required|max:200',
            'precio'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'cantidad'=>'required'
        ];
    }
}
