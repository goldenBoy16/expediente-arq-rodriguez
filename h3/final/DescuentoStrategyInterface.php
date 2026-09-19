<?php
namespace App\Final;

interface DescuentoStrategyInterface {
    public function calcularDescuento(float $montoTotal): float;
}