<?php
namespace App\Repositories;

use App\Models\Venta;

class MySqlVentaRepository implements VentaRepositoryInterface {
    public function guardar(Venta $venta): bool {
        echo "   [BD MySQL] Ejecutando: INSERT INTO ventas (total) VALUES ({$venta->getTotal()})\n";
        $venta->setIdVenta(999);
        return true;
    }
}