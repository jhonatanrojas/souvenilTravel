<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'municipios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigo_municipio',
        'codigo_estado_id',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function codigoMunicipioDestinos()
    {
        return $this->hasMany(Destino::class, 'codigo_municipio_id', 'id');
    }

    public function codigo_estado()
    {
        return $this->belongsTo(Estado::class, 'codigo_estado_id');
    }
}
