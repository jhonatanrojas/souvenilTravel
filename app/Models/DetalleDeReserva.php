<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleDeReserva extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'detalle_de_reservas';

    protected $dates = [
        'fecha_desde',
        'fecha_hasta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reserva_id',
        'producto_id',
        'cant_adultos',
        'cant_ninos',
        'fecha_desde',
        'fecha_hasta',
        'moneda',
        'tasa_de_cambio',
        'precio',
        'total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    public function producto()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }

    public function getFechaDesdeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDesdeAttribute($value)
    {
        $this->attributes['fecha_desde'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaHastaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaHastaAttribute($value)
    {
        $this->attributes['fecha_hasta'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
