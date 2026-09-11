<?php
namespace App\Factory;

class SmsNotificacion implements NotificacionInterface {
    public function enviar(string $mensaje): bool {
        echo "[SMS] Enviando alerta: {$mensaje}\n";
        return true;
    }
}