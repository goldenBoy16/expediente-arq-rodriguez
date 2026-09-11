<?php
namespace App\Modelos;

class VentaGuardian {
    public ?string $cliente = null;
    public array $detalles = [];
    public float $descuento = 0.0;
    public string $estado = 'PENDIENTE';
    public float $total = 0.0;

    public function calcularTotal(): void {
        $subtotal = 0.0;
        foreach ($this->detalles as $item) {
            $subtotal += $item['subtotal'];
        }
        $this->total = $subtotal - $this->descuento;
    }
}