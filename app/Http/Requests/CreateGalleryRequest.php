<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
            //
            "name"=> "required | string | min:2 | max:255",
            "description"=>'sometimes | string | max:1000',
            'source' => ['required','string','url', 'regex:/.(jpg|png)($|\?.*)/'], // (http)?s?:?(\/\/[^"']*\.(?:png|jpg|jpeg|gif|png|svg))
            'user_id' => 'required | string | unique: galleries.users'
        ];
    }
}
