<?php

namespace App\Repositories;

use App\Interfaces\SerieInterface;
use App\Models\Serie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class SerieRepository implements SerieInterface
{
    protected $model;

    public function __construct(Serie $serie)
    {
        $this->model = $serie;
    }

    public function all()
    {
        try {
            $serie = $this->model->all();
            if ($serie->isEmpty()) {
                return response()->json(['error' => 'Nenhuma série encontrada'], 404);
            }
            return $serie;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function find($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Série não encontrada'], 404);
        }
    }

    public function create(array $data)
    {
        try {
            $serie = $this->model->create($data);
            return response()->json($serie, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar série'], 400);
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $existingSerie = $this->model->findOrFail($id);
            $existingSerie->update($data);
            return response()->json(['message' => 'Série atualizada com sucesso!'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Série não encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar série'], 400);
        }
    }

    public function delete($id)
    {
        try {
            $serie = $this->model->findOrFail($id);
            $serie->delete();
            return response()->json(['success' => 'Série deletada com sucesso'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Erro ao deletar série'], 404);
        }
    }
}
