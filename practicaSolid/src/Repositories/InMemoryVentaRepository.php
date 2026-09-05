<?php
namespace App\Repositories;

use App\Models\Venta;

class InMemoryVentaRepository implements VentaRepositoryInterface {
    public array $ventasGuardadas = [];

    public function guardar(Venta $venta): bool {
        $venta->setIdVenta(count($this->ventasGuardadas) + 1);
        $this->ventasGuardadas[] = $venta;
        return true;
    }
}