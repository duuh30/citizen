<?php

namespace App\Services;

use GuzzleHttp\Client;

class ZipCodeService {

    /**
     * @var $ws
     */
    protected $ws;

    /**
     * zipCodeService constructor.
     */
    public function __construct()
    {
        $this->ws = env('VIA_CEP_WS', 'https://viacep.com.br/ws/');
    }

    /**
     * @param $zip_code
     * @return string
     */
    public function find($zip_code)
    {
        $client = $this->getClient();
        $response = $client->get($this->ws . $zip_code . '/json');

        $address = json_decode($response->getBody()->getContents(), true);

        return $this->parseAddress($address);
    }

    /**
     * @param $address
     * @return array
     */
    public function parseAddress($address)
    {
        return [
            'street'   => $address['logradouro'],
            'district' => $address['bairro'],
            'city'     => $address['localidade'],
            'state'    => $address['uf'],
        ];
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return new Client([]);
    }
}
