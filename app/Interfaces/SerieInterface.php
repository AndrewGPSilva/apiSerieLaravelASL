<?php

namespace App\Interfaces;

use App\Models\Serie;

interface SerieInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(Serie $serie, array $data);

    public function delete(Serie $serie);
}
