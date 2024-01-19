<?php

namespace App\Services;

use App\Repositories\SerieRepository;

class SerieService {

    protected $repository;

    public function __construct(SerieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $serie = $this->repository->find($id);
        return $this->repository->update($serie, $data);
    }

    public function delete($id)
    {
        $serie = $this->repository->find($id);
        return $this->repository->delete($serie);
    }
}
