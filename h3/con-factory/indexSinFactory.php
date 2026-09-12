<?php
require_once __DIR__ . '/NotificacionInterface.php';
require_once __DIR__ . '/EmailNotificacion.php';
require_once __DIR__ . '/SmsNotificacion.php';

$canal = 'email'; // El código cliente decide manualmente qué clase concreta instanciar
$notificador = null;

// ACOPLAMIENTO DIRECTO: Si se agrega un nuevo canal, hay que modificar este bloque en todas partes
if ($canal === 'email') {
    $notificador = new \App\Factory\EmailNotificacion();
} elseif ($canal === 'sms') {
    $notificador = new \App\Factory\SmsNotificacion();
}

if ($notificador) {
    $notificador->enviar("Alerta sin Factory: El producto 'Mouse Logitech' alcanzó el stock mínimo.");
}