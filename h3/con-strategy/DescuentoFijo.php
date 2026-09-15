<?php
namespace App\Strategy;

require_once __DIR__ . '/DescuentoStrategyInterface.php';

class DescuentoFijo implements DescuentoStrategyInterface {
    public function __construct(private float $montoFijo) {}

    public function calcularDescuento(float $subtotal): float {
        return min($this->montoFijo, $subtotal);
    }
}