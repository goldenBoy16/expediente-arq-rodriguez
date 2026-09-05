<?php
namespace App\Models;

abstract class Persona {
    protected int $id;
    protected string $nombre;
    protected string $apellido;
    protected string $direccion;
    protected string $telefono;

    public function __construct(int $id, string $nombre, string $apellido, string $direccion, string $telefono) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function getNombreCompleto(): string {
        return "{$this->nombre} {$this->apellido}";
    }
}