<?php
namespace App\Strategy;

require_once __DIR__ . '/DescuentoStrategyInterface.php';

class SinDescuento implements DescuentoStrategyInterface {
    public function calcularDescuento(float $subtotal): float {
        return 0.0;
    }
}