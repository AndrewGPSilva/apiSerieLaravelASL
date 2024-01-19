<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Services\SerieService;

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

    public function store(SerieRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function update(SerieRequest $request, $id)
    {
        return $this->service->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
