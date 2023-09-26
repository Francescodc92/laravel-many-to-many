<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
//facades
use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:100',
            'preview'=>'nullable|image|max:2048',
            'collaborators'=>'nullable|max:255',
            'description'=>'required',
            'type_id'=>'nullable|exists:types,id',
            'technologies'=>'nullable|array',
            'technologies.*'=>'exists:technologies,id',
            'remove_preview_img'=> 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'il titolo non può essere più lungo di 100 caratteri spazi compresi',
            'preview.image'=> 'il file dell\'immagine non è una immagine',
            'preview.max'=> 'il file dell\'immagine non può essere più lungo di 2048 caratteri spazi inclusi ',
            'collaborators.max'=> 'il contenuto dei collaboratori non può essere un testo più lungo di 255 caratteri spazi inclusi ',
            'description.required'=> 'la descrizione è obligatoria',
            'type_id.exists'=> 'la categoria non esiste',
            'technologies.array'=> 'il dato tecnologie non è una collezione di tecnologie quindi non è valido',
            'technologies.exists'=> 'la tecnologia passata non esiste nella lista delle tecnologie' // chiedere ad alessio come creare un messaggio per la validazione 
        ];
    }
}
