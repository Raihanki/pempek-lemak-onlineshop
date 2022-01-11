<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nama' => 'string|required|max:50',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'kategori' => 'required',
            'deskripsi' => 'string|max:400',
            'kuantitas' => 'integer',
            'harga' => 'integer|required'
        ];
    }
}
