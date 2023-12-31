<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $aulas = Serie::all();
        return response()->json($aulas);
    }

    public function store(Request $request)
    {
        $aula = Serie::create($request->all());
        return response()->json($aula);
    }

    public function show($id)
    {
        $aula = Serie::find($id);
        return response()->json($aula);
    }

    public function update(Request $request, $id)
    {
        $aula = Serie::find($id);
        $aula->update($request->all());
        return response()->json($aula);
    }

    public function destroy($id)
    {
        $aula = Serie::find($id);
        $aula->delete();
        return response()->json(['message' => 'Serie deletada com sucesso!']);
    }
}
