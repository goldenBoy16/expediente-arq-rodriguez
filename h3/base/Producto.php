<?php
namespace App\Base;

class Producto {
    public function __construct(
        public string $id,
        public string $nombre,
        public float $precio,
        public int $stock,
        public int $stockMinimo,
        public int $stado
    ) {}
}
