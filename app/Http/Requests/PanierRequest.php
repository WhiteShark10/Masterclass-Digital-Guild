<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'productId' => 'required|string',
            'size' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'productId.required' => 'Le champ productId est requis.',
            'productId.string' => 'Le champ productId doit une chaine de caractere.',
            'size.required' => 'Le champ taille est requis.',
            'size.string' => 'Le champ taille doit être une chaîne.',
            'size.max' => 'Le champ taille ne peut pas dépasser 255 caractères.',
        ];
    }
}
