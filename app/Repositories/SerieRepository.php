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
        return $this->model->create($data);
    }

    public function update(Serie $serie, array $data)
    {
        return $serie->update($data);
    }

    public function delete(Serie $serie)
    {
        return $serie->delete();
    }
}
