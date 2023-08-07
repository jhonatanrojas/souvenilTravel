<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pagos';

    protected $dates = [
        'fecha_de_pago',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reserva_id',
        'monto',
        'moneda',
        'tasa_de_cambio',
        'fecha_de_pago',
        'forma_de_pago',
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

    public function getFechaDePagoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDePagoAttribute($value)
    {
        $this->attributes['fecha_de_pago'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
