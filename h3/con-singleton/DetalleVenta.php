<?php
namespace App\Base;

class DetalleVenta {
    public float $subtotal;

    public function __construct(
        public Producto $producto,
        public int $cantidad
    ) {
        $this->subtotal = $producto->precio * $cantidad;
    }
}