<?php
namespace App\Factory;

class EmailNotificacion implements NotificacionInterface {
    public function enviar(string $mensaje): bool {
        echo "[EMAIL] Enviando alerta: {$mensaje}\n";
        return true;
    }
}