<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategorium extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sub_categoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'categoria_id',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function subCategoriaProducts()
    {
        return $this->hasMany(Product::class, 'sub_categoria_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(ProductCategory::class, 'categoria_id');
    }
}
