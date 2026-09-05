<?php
namespace App\Models;

class Producto {
    private int $idProducto;
    private string $nombre;
    private float $precio;
    private int $stock;

    public function __construct(int $idProducto, string $nombre, float $precio, int $stock) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getPrecio(): float { return $this->precio; }
    public function getStock(): int { return $this->stock; }

    public function verificarStock(int $cantidad): bool {
        return $this->stock >= $cantidad;
    }

    public function reducirStock(int $cantidad): void {
        if (!$this->verificarStock($cantidad)) {
            throw new \Exception("Stock insuficiente para: " . $this->nombre);
        }
        $this->stock -= $cantidad;
    }
}