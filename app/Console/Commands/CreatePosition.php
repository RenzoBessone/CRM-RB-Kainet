<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Position;
use Illuminate\Support\Facades\Validator;

class CreatePosition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'position:create 
                            {--idEmpresa= : ID de la empresa}
                            {--idProducto= : Nombre del idProductoo}
                            {--fechaEntregaInicio= : Fecha de entrega}
                            {--moneda= : Moneda (Pesos o USD)}
                            {--precio= : Precio}';

    // php artisan position:create --idEmpresa=1 --idProducto=1 --fechaEntregaInicio="2024-08-30" --moneda=Pesos --precio=100.00

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear una nueva posición';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $companyId = $this->option('idEmpresa');
        $productId = $this->option('idProducto');
        $deliveryDate = $this->option('fechaEntregaInicio');
        $currency = $this->option('moneda');
        $price = $this->option('precio');

        $validator = Validator::make(
            [
                'idEmpresa' => $companyId,
                'idProducto' => $productId,
                'fechaEntregaInicio' => $deliveryDate,
                'moneda' => $currency,
                'precio' => $price
            ],
            [
                'idEmpresa' => 'required|integer',
                'idProducto' => 'required|string|max:255',
                'fechaEntregaInicio' => 'required|date',
                'moneda' => 'required|in:Pesos,USD',
                'precio' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            $this->error('Error en la validación:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        Position::create([
            'idEmpresa' => $companyId,
            'idProducto' => $productId,
            'fechaEntregaInicio' => $deliveryDate,
            'moneda' => $currency,
            'precio' => $price
        ]);

        $this->info('Posición creada exitosamente.');

        return 0;
    }
}
