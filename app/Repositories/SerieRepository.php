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
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
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
