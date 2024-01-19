<?php

namespace App\Repositories;

use App\Models\Serie;

class SerieRepository
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
            return response()->json(['error' => 'Série não encontrada', 'Generic Message' => $e->getMessage()], 404);
        }
    }

    public function create(array $data)
    {
        try {
            $serie = $this->model->create($data);
            return response()->json($serie, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar série', 'Generic Message' => $e->getMessage()], 400);
        }
    }

    public function update(Serie $serie, array $data)
    {
        try {
            $serie->update($data);
            return response()->json(['message' => 'Série atualizada com sucesso!'], 200);
        } catch (\Exception $e) {
            if ($serie->isEmpty()) {
                return response()->json(['error' => 'Série não encontrada', 'details' => $e->getMessage()], 404);
            }
            return response()->json(['error' => 'Erro ao atualizar série', 'details' => $e->getMessage()], 400);
        }
    }

    public function delete(Serie $serie)
    {
        try {
            $serie = $this->model->find($serie->id);
            $serie->delete();
            return response()->json(['success' => 'Série deletada com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar série', 'Generic Message' => $e->getMessage()], 400);
        }
    }
}
