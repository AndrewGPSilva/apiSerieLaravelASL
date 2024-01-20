<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Services\SerieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SerieController extends Controller
{
    protected $service;

    public function __construct(SerieService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'titulo' => 'required|max:30|min:3|unique:series,titulo',
            'capa' => 'required|url|unique:series,titulo',
            'genero' => 'required|min:3|max:20',
            'sinopse' => 'required|min:3|max:1000|unique:series,titulo',
            'ano' => 'required|integer|min:1900|max:2024',
            'temporadas' => 'required|integer|min:1|max:100',
            'episodios' => 'required|integer|min:1|max:1000',
            'classificacao' => 'required|integer|min:1|max:18',
        ]);

        if($validator->fails()){
            return response()->json([
                "error" => 'Erro de validação',
                "message" => $validator->errors(),
            ], 422);
        } else {
            return $this->service->create($request->all());
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'titulo' => 'required|max:30|min:3|unique:series,titulo',
            'capa' => 'required|url|unique:series,titulo',
            'genero' => 'required|min:3|max:20',
            'sinopse' => 'required|min:3|max:1000|unique:series,titulo',
            'ano' => 'required|integer|min:1900|max:2024',
            'temporadas' => 'required|integer|min:1|max:100',
            'episodios' => 'required|integer|min:1|max:1000',
            'classificacao' => 'required|integer|min:1|max:18',
        ]);

        if($validator->fails()){
            return response()->json([
                "error" => 'Erro de validação',
                "message" => $validator->errors(),
            ], 422);
        } else {
            return $this->service->update($id, $request->all());
        }
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
