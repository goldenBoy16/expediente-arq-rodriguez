<?php
namespace App\Strategy;

interface DescuentoStrategyInterface {
    public function calcularDescuento(float $subtotal): float;
}