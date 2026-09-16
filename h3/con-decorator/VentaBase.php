<?php
namespace App\Decorator;

require_once __DIR__ . '/ComprobanteInterface.php';

class VentaBase implements ComprobanteInterface {
    public function __construct(private float $montoBase) {}

    public function getDescripcion(): string {
        return "Venta Base";
    }

    public function getCosto(): float {
        return $this->montoBase;
    }
}