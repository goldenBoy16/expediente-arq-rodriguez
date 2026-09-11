<?php
require_once __DIR__ . '/NotificacionInterface.php';
require_once __DIR__ . '/EmailNotificacion.php';
require_once __DIR__ . '/SmsNotificacion.php';
require_once __DIR__ . '/NotificacionFactory.php';

use App\Factory\NotificacionFactory;

echo "=== PRUEBA PATRÓN FACTORY ===\n";
$notificador = NotificacionFactory::crear('email');
$notificador->enviar("El producto 'Laptop HP' ha alcanzado el stock mínimo (2 unidades).");