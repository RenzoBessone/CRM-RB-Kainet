<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Product;

class Position extends Model
{
    use HasFactory;

    protected $table = 'Posiciones';

    protected $fillable = ['idEmpresa', 'idProducto', 'fechaEntregaInicio', 'moneda', 'precio'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProducto');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'idEmpresa');
    }
}
