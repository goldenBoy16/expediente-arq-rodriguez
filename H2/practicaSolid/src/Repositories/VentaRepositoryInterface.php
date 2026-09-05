<?php
namespace App\Repositories;

use App\Models\Venta;

interface VentaRepositoryInterface {
    public function guardar(Venta $venta): bool;
}