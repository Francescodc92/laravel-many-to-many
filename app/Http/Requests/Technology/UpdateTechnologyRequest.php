<?php

namespace App\Http\Requests\Technology;

use Illuminate\Foundation\Http\FormRequest;
//helpers
use Illuminate\Support\Facades\Auth;

class UpdateTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:64',
            'description'=>'required',  
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'il titolo non può essere più lungo di 64 caratteri spazi compresi',
            'description.required'=> 'la descrizione è obligatoria',
        ];
    }
    
}
