<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reservas';

    protected $dates = [
        'fecha_reserva',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nro_reserva',
        'cliente_id',
        'subtotal',
        'total',
        'moneda',
        'tasa_de_cambio',
        'fecha_reserva',
        'prestado_de_servicio_id',
        'estatus_reserva_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function getFechaReservaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaReservaAttribute($value)
    {
        $this->attributes['fecha_reserva'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function prestado_de_servicio()
    {
        return $this->belongsTo(PrestadoresDeServicio::class, 'prestado_de_servicio_id');
    }

    public function estatus_reserva()
    {
        return $this->belongsTo(EstatusReserva::class, 'estatus_reserva_id');
    }
}
