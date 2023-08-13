<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enlace extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'enlaces';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TARGET_SELECT = [
        '_blank' => '_blank',
        '_self'  => '_self',
    ];

    protected $fillable = [
        'nombre',
        'url',
        'orden',
        'icono',
        'target',
        'grupo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GRUPO_SELECT = [
        'menu'           => 'menu principal',
        'menu_izquierda' => 'menu a la izquierda',
        'menu_derecha'   => 'menu a la izquierda',
        'pie_de_pagina'  => 'pie de pagina',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
