<?php
namespace App\Services;

use App\Models\Venta;
use App\Repositories\VentaRepositoryInterface;

class VentaService {
    private VentaRepositoryInterface $ventaRepository;

    // Inyección por constructor: NO hacemos "new MySqlRepository()" aquí
    public function __construct(VentaRepositoryInterface $ventaRepository) {
        $this->ventaRepository = $ventaRepository;
    }

    public function procesarVenta(Venta $venta): bool {
        if (count($venta->getDetalles()) === 0) {
            throw new \Exception("La venta no tiene productos.");
        }

        foreach ($venta->getDetalles() as $detalle) {
            $detalle->getProducto()->reducirStock($detalle->getCantidad());
        }

        $venta->cambiarEstado('COMPLETADA');

        // Guarda usando la abstracción
        return $this->ventaRepository->guardar($venta);
    }
}