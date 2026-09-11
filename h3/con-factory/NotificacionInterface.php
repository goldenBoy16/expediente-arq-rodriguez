<?php
namespace App\Factory;

interface NotificacionInterface {
    public function enviar(string $mensaje): bool;
}