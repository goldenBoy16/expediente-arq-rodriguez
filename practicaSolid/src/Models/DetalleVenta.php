<?php
namespace App\Models;

class DetalleVenta {
    private Producto $producto;
    private int $cantidad;
    private float $precioUnitario;
    private float $subTotal;

    public function __construct(Producto $producto, int $cantidad) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $producto->getPrecio();
        $this->subTotal = $this->cantidad * $this->precioUnitario;
    }

    public function getProducto(): Producto { return $this->producto; }
    public function getCantidad(): int { return $this->cantidad; }
    public function getSubTotal(): float { return $this->subTotal; }
}