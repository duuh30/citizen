<?php

namespace App\Http\Controllers\Traits;

use App\Services\AppService;
use Illuminate\Http\Request;

trait CrudMethods
{

    /**
     * @var AppService $service
     */
    protected $service;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json($this->service->all($request->query->get('limit', 15)));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->service->create($request->all()), 201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->service->show($id));
    }

    /**
     * @param $field
     * @param $value
     * @return \Illuminate\Http\JsonResponse
     */
    public function findBy($field, $value)
    {
        return response()->json($this->service->findBy($field, $value));
    }

}
