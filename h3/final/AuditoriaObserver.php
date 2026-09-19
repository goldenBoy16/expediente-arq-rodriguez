<?php
namespace App\Final;

require_once __DIR__ . '/VentaObserverInterface.php';

class AuditoriaObserver implements VentaObserverInterface {
    public function actualizar(string $evento, array $datos): void {
        echo "[AUDITORIA] Evento: {$evento} | Cliente: {$datos['cliente']} | Monto Final: Bs. " . number_format($datos['montoFinal'], 2) . "\n";
    }
}