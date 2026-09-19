<?php
namespace App\Final;

require_once __DIR__ . '/VentaObserverInterface.php';

class InventarioObserver implements VentaObserverInterface {
    public function actualizar(string $evento, array $datos): void {
        echo "[INVENTARIO] Actualizando stock y registrando salida de productos para el cliente: {$datos['cliente']}\n";
    }
}