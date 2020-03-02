<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitizenRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\CrudMethods;
use App\Services\CitizenService;

class CitizenController extends Controller
{
    use CrudMethods;

    /**
     * @var CitizenService
     */
    protected $service;

    /**
     * @var $validation
     */
    protected $validation;

    /**
     * CitizenController constructor.
     * @param CitizenService $service
     */
    public function __construct(CitizenService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CitizenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CitizenRequest $request)
    {
        return response()->json($this->service->processCreate($request->all()), 201);
    }

    /**
     * @param $cpf
     * @return \Illuminate\Http\JsonResponse
     */
    public function findByCpf($cpf)
    {
        return response()->json($this->service->findByCpf($cpf));
    }
}
