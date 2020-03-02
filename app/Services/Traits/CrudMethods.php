<?php

namespace App\Services\Traits;

trait CrudMethods
{

    /**
     * @var $model
     */
    protected $model;

    /**
     * @var $transform
     */
    protected $transform;

    /**
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 15)
    {
        if ($this->transform) {
            return $this->transform->transform($this->model->limit($limit)->get());
        }

        return $this->model->paginate($limit);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->transform->transform($this->model->find($id), true);
    }

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findBy($field, $value)
    {
        return $this->transform->transform($this->model->where($field, $value)->first(), true);
    }

}
