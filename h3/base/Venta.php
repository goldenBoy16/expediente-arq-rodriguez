<?php
namespace App\Base;

class Venta {
    public array $items = [];
    public float $total = 0.0;

    public function agregarProducto(Producto $producto, int $cantidad): void {
        $this->items[] = [
            'producto' => $producto,
            'cantidad' => $cantidad,
            'subtotal' => $producto->precio * $cantidad
        ];
        $this->total += $producto->precio * $cantidad;
    }
}