<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrestadoresDeServicio extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'prestadores_de_servicios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre_razon_social',
        'direccion',
        'telefono',
        'telefono_2',
        'nombre_representate',
        'email',
        'password',
        'estado_id',
        'municipio_id',
        'user_regiter_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function user_regiter()
    {
        return $this->belongsTo(User::class, 'user_regiter_id');
    }
}
