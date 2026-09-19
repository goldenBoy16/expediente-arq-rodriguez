<?php
namespace App\Final;

require_once __DIR__ . '/DescuentoStrategyInterface.php';

class SinDescuentoStrategy implements DescuentoStrategyInterface {
    public function calcularDescuento(float $montoTotal): float {
        return 0.0;
    }
}