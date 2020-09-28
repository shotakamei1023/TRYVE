<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    //リダイレクトさせたいパス
    protected $redirect = 'contents/create';
    
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
        'title' => 'required',
        'prefectures'=> 'required',
        'price' => 'required',
        'address' => 'required',
        'order' => 'required',
        'gmap' => 'required'
        ];
    }
}