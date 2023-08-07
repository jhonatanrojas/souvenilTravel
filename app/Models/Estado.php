<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'estados';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigoestado',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function codigoEstadoMunicipios()
    {
        return $this->hasMany(Municipio::class, 'codigo_estado_id', 'id');
    }

    public function codigoEstadoDestinos()
    {
        return $this->hasMany(Destino::class, 'codigo_estado_id', 'id');
    }
}
