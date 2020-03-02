<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citizen extends Model
{
    use SoftDeletes;

    /**
     * @var $table
     */
    protected $table = 'citizens';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'cpf',
        'phone',
        'cellphone',
        'email',
        'zip_code',
        'street',
        'district',
        'city',
        'state'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getFullNameAttribute($value)
    {
        return "{$this->name} {$this->surname}";
    }
}
