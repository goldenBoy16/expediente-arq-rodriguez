<?php
namespace App\Observer;

require_once __DIR__ . '/VentaObserverInterface.php';
require_once __DIR__ . '/Venta.php';

class VentaSubject {
    private array $observadores = [];

    public function suscribir(VentaObserverInterface $observador): void {
        $this->observadores[] = $observador;
    }

    public function procesarVenta(\App\Base\Venta $venta): void {
        echo "[SUJETO] Venta completada para {$venta->cliente}. Notificando a " . count($this->observadores) . " observadores...\n";
        foreach ($this->observadores as $obs) {
            $obs->actualizar($venta);
        }
    }
}