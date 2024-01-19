<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'capa' => 'nullable|url',
            'genero' => 'required|string|max:255',
            'sinopse' => 'required|string',
            'ano' => 'required|integer|min:1900|max:',
            'temporadas' => 'required|integer|min:1',
            'episodios' => 'required|integer|min:1',
            'classificacao' => 'required|string|max:255',
        ];
    }
}
