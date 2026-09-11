<?php
namespace App\Adapter;

// Contrato propio de tu sistema de ventas
interface ProcesadorPagoInterface {
    public function procesarPago(float $montoEnBolivianos, string $referenciaVenta): bool;
}