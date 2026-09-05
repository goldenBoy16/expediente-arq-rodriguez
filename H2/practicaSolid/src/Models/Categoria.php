<?php
namespace App\Models;

class Categoria {
    private int $idCategoria;
    private string $nombre;
    private string $descripcion;

    public function __construct(int $idCategoria, string $nombre, string $descripcion) {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}