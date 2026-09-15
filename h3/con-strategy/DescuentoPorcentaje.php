<?php
namespace App\Strategy;

require_once __DIR__ . '/DescuentoStrategyInterface.php';

class DescuentoPorcentaje implements DescuentoStrategyInterface {
    public function __construct(private float $porcentaje) {}

    public function calcularDescuento(float $subtotal): float {
        return $subtotal * ($this->porcentaje / 100);
    }
}