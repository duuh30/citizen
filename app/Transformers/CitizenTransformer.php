<?php

namespace App\Transformers;

use App\Entities\Citizen;

class CitizenTransformer
{
    /**
     * @param $model
     * @param bool $first
     * @return array
     */
    public function transform($model, $first = false)
    {
        $data = [
            'error' => false,
            'data' => [],
        ];

        if ($first && $model) {
            $data['data'] = [
                'id' => $model->id,
                'name' => $model->fullname,
                'contacts' => $this->parseContacts($model),
                'address' => $this->parseAddress($model),
            ];
        } else if($model) {
            foreach ($model as $citizen) {
                $data['data'][] = [
                    'id' => $citizen->id,
                    'name' => $citizen->fullname,
                    'contacts' => $this->parseContacts($citizen),
                    'address' => $this->parseAddress($citizen),
                ];
            }
        }

        return $data;
    }

    /**
     * @param Citizen $citizen
     * @return array
     */
    public function parseAddress(Citizen $citizen)
    {
        return [
          'zip_code' => $citizen->zip_code,
          'street'   => $citizen->street,
          'district' => $citizen->district,
          'city'     => $citizen->city,
          'state'    => $citizen->state,
        ];
    }

    /**
     * @param Citizen $citizen
     * @return array
     */
    public function parseContacts(Citizen $citizen)
    {
        return [
          'email'     => $citizen->email,
          'phone'     => $citizen->phone,
          'cellphone' => $citizen->cellphone
        ];
    }
}
