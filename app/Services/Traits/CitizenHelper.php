<?php

namespace App\Services\Traits;

trait CitizenHelper
{
    /**
     * @param $cpf
     * @return string|string[]|null
     */
    public function formatCpf($cpf)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
    }
}
