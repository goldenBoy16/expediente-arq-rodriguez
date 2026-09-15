<?php
namespace App\Observer;

require_once __DIR__ . '/VentaObserverInterface.php';

class InventarioObserver implements VentaObserverInterface {
    public function actualizar(\App\Base\Venta $venta): void {
        echo "[INVENTARIO] Descontando stock de productos para la venta procesada.\n";
    }
}