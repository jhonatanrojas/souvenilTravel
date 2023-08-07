<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BloquesPagina extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'bloques_paginas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_SELECT = [
        'view' => 'vista-template',
        'html' => 'html',
    ];

    protected $fillable = [
        'nombre',
        'posicion',
        'pagina',
        'tipo',
        'conetenido',
        'orden',
        'estatus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const POSICION_SELECT = [
        'banner_top' => 'Parte superior del banner',
        'top'        => 'arriba',
        'buttom'     => 'abajo',
        'left'       => 'izquierda',
        'right'      => 'derecha',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }
}
