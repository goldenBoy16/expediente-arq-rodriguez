<?php
namespace App\Factory;

class NotificacionFactory {
    public static function crear(string $canal): NotificacionInterface {
        return match (strtolower($canal)) {
            'email' => new EmailNotificacion(),
            'sms'   => new SmsNotificacion(),
            default => throw new \InvalidArgumentException("Canal de notificación no soportado: {$canal}")
        };
    }
}