<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Product extends Model
{
    protected $table = 'Productos';

    public function positions()
    {
        return $this->hasMany(Position::class, 'idProducto');
    }
}
