<?php
namespace App\Observer;

require_once __DIR__ . '/VentaObserverInterface.php';

class AuditoriaObserver implements VentaObserverInterface {
    public function actualizar(\App\Base\Venta $venta): void {
        echo "[AUDITORÍA] Registro guardado en log para el cliente: {$venta->cliente}\n";
    }
}