<?php
namespace App\Final;

require_once __DIR__ . '/DescuentoStrategyInterface.php';

class DescuentoPorcentajeStrategy implements DescuentoStrategyInterface {
    public function __construct(private float $porcentaje) {}

    public function calcularDescuento(float $montoTotal): float {
        return $montoTotal * ($this->porcentaje / 100);
    }
}