<?php
namespace App\Base;

class Venta {
    public string $cliente;
    public array $detalles = [];
    public float $total = 0.0;

    public function __construct(string $cliente) {
        $this->cliente = $cliente;
    }

    public function agregarDetalle(DetalleVenta $detalle): void {
        $this->detalles[] = $detalle;
        $this->total += $detalle->subtotal;
    }
}