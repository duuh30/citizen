<?php

namespace App\Services;

use App\Entities\Citizen;
use App\Services\Traits\CitizenHelper;
use App\Services\ZipCodeService;
use App\Services\Traits\CrudMethods;
use App\Transformers\CitizenTransformer;

class CitizenService
{

    use CrudMethods, CitizenHelper;

    /**
     * @var Citizen
     */
    protected $model;

    /**
     * @var $transform
     */
    protected $transform;

    /**
     * @var zipCodeService
     */
    protected $zipCodeService;

    /**
     * CitizenService constructor.
     * @param Citizen $model
     * @param \App\Services\ZipCodeService $zipCodeService
     * @param CitizenTransformer $citizenTransformer
     */
    public function __construct(Citizen $model, ZipCodeService $zipCodeService, CitizenTransformer $citizenTransformer)
    {
        $this->model = $model;
        $this->zipCodeService = $zipCodeService;
        $this->transform = $citizenTransformer;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function processCreate(array $data)
    {
        $responseAddress = $this->zipCodeService->find($data['zip_code']);

        return $this->model->create(array_merge($data, $responseAddress));
    }

    /**
     * @param $cpf
     * @return array
     */
    public function findByCpf($cpf)
    {
        $cpfFormatted = $this->formatCpf($cpf);

        return $this->transform->transform($this->model->where('cpf', $cpfFormatted)->first(), true);
    }

}
