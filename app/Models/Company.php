<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Company extends Model
{
    protected $table = 'Empresas';

    public function positions()
    {
        return $this->hasMany(Position::class, 'idEmpresa');
    }
}
