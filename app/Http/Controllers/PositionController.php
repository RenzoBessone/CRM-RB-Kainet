<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function index()
    {

        $positions = Position::with(['product', 'company'])->get()->sortByDesc(function ($position) {
            return $position->product->usoFrecuente;
        });        

        return response()->json($positions);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'precio' => 'required|numeric|min:0.01',
            'fechaEntregaInicio' => 'required|date|after_or_equal:today',
            'idEmpresa' => 'required|exists:empresas,id',
            'idProducto' => 'required|exists:productos,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $position = Position::create($request->all());
        return response()->json($position, 201);    

    }
}
