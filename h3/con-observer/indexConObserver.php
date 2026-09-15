<?php
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';
require_once __DIR__ . '/VentaObserverInterface.php';
require_once __DIR__ . '/AuditoriaObserver.php';
require_once __DIR__ . '/InventarioObserver.php';
require_once __DIR__ . '/VentaSubject.php';

use App\Base\Producto;
use App\Base\DetalleVenta;
use App\Base\Venta;
use App\Observer\VentaSubject;
use App\Observer\AuditoriaObserver;
use App\Observer\InventarioObserver;

echo "========================================\n";
echo "       PRUEBA CON PATRÓN OBSERVER       \n";
echo "========================================\n\n";

$venta = new Venta("María Flores");
$prod = new Producto("P-02", "Impresora Térmica", 450.00, 5, 1);
$venta->agregarDetalle(new DetalleVenta($prod, 1));

$sujeto = new VentaSubject();

// Suscripción desacoplada
$sujeto->suscribir(new AuditoriaObserver());
$sujeto->suscribir(new InventarioObserver());

// Publicación del evento
$sujeto->procesarVenta($venta);