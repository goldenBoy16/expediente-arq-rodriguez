<?php
namespace App\Models;

class Usuario extends Persona {
    protected string $nombreUsuario;
    protected string $contrasenia;

    public function __construct(int $id, string $nombre, string $apellido, string $direccion, string $telefono, string $nombreUsuario, string $contrasenia) {
        parent::__construct($id, $nombre, $apellido, $direccion, $telefono);
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenia = $contrasenia;
    }

    public function recuperarContrasenia(): string {
        return "Correo de recuperación enviado a " . $this->nombreUsuario;
    }
}