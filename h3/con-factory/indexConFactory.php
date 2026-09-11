<?php
require_once __DIR__ . '/NotificacionInterface.php';
require_once __DIR__ . '/EmailNotificacion.php';
require_once __DIR__ . '/SmsNotificacion.php';
require_once __DIR__ . '/NotificacionFactory.php';

use App\Factory\NotificacionFactory;

// 1. Instanciación delegada a la fábrica (Email)
$notificadorEmail = NotificacionFactory::crear('email');
$notificadorEmail->enviar("Alerta con Factory: El producto 'Laptop HP' alcanzó el stock mínimo (2 unidades).");

// 2. Cambiar de canal sin alterar el código cliente (SMS)
$notificadorSms = NotificacionFactory::crear('sms');
$notificadorSms->enviar("Alerta con Factory: Stock crítico en 'Teclado Mecánico'.");