<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Product::orderBy('usoFrecuente', 'desc')->get();
        return response()->json($productos);
    }
}

