<?php
require_once __DIR__ . '/DescuentoStrategyInterface.php';
require_once __DIR__ . '/SinDescuentoStrategy.php';
require_once __DIR__ . '/DescuentoPorcentajeStrategy.php';
require_once __DIR__ . '/VentaObserverInterface.php';
require_once __DIR__ . '/AuditoriaObserver.php';
require_once __DIR__ . '/InventarioObserver.php';
require_once __DIR__ . '/VentaService.php';

use App\Final\SinDescuentoStrategy;
use App\Final\DescuentoPorcentajeStrategy;
use App\Final\AuditoriaObserver;
use App\Final\InventarioObserver;
use App\Final\VentaService;

echo "========================================\n";
echo "   SISTEMA DE VENTAS - FUSION H4        \n";
echo "========================================\n\n";

// 1. Instanciar servicio con estrategia por defecto (Sin Descuento)
$servicioVenta = new VentaService(new SinDescuentoStrategy());

// 2. Registrar observadores
$servicioVenta->adjuntar(new AuditoriaObserver());
$servicioVenta->adjuntar(new InventarioObserver());

// 3. Ejecutar Venta 1
echo "--- CASO 1: VENTA REGULAR ---\n";
$servicioVenta->procesarVenta("Juan Perez", 150.00);

echo "\n----------------------------------------\n\n";

// 4. Cambiar estrategia a Descuento del 10%
$servicioVenta->setEstrategiaDescuento(new DescuentoPorcentajeStrategy(10));

// 5. Ejecutar Venta 2
echo "--- CASO 2: VENTA CON DESCUENTO PROMOCIONAL ---\n";
$servicioVenta->procesarVenta("Maria Gomez", 300.00);