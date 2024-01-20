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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:30|min:3',
            'capa' => 'required|url',
            'genero' => 'required|min:3|max:20',
            'sinopse' => 'required|min:3|max:1000',
            'ano' => 'required|integer|min:1900|max:2024',
            'temporadas' => 'required|integer|min:1|max:100',
            'episodios' => 'required|integer|min:1|max:1000',
            'classificacao' => 'required|integer|min:1|max:18',
        ];
    }
}
