<?php
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';
require_once __DIR__ . '/NotificacionInterface.php';
require_once __DIR__ . '/EmailNotificacion.php';
require_once __DIR__ . '/SmsNotificacion.php';
require_once __DIR__ . '/ImprimirTicketNotificacion.php';
require_once __DIR__ . '/NotificacionFactory.php';

use App\Base\Producto;
use App\Base\DetalleVenta;
use App\Base\Venta;
use App\Factory\NotificacionFactory;

echo "========================================\n";
echo "       PRUEBA CON PATRÓN FACTORY        \n";
echo "========================================\n\n";

// Crear la Venta
$venta = new Venta("Carlos Mamani");
$prod = new Producto("P-01", "Teclado Mecánico", 250.00, 10, 2);
$venta->agregarDetalle(new DetalleVenta($prod, 1));

$mensajeVenta = "Venta a {$venta->cliente} ==> {$prod->nombre} por un total de Bs. {$venta->total}";

// 1. Notificación vía Email
$notificadorEmail = NotificacionFactory::crear('email');
$notificadorEmail->enviar($mensajeVenta);

// 2. Notificación vía SMS
$notificadorSms = NotificacionFactory::crear('sms');
$notificadorSms->enviar($mensajeVenta);

// 3. Notificación vía Ticket en Caja Local
$notificadorTicket = NotificacionFactory::crear('ticket');
$notificadorTicket->enviar($mensajeVenta);