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
echo "   SISTEMA DE VENTAS - FUSION H3        \n";
echo "========================================\n\n";

// 1. Lectura de datos por teclado
$cliente = readline("Ingrese el nombre del cliente: ");
$montoInput = readline("Ingrese el monto subtotal de la venta (Bs.): ");
$montoSubtotal = floatval($montoInput);

echo "\nSeleccione la Estrategia de Descuento:\n";
echo "1. Sin Descuento\n";
echo "2. Descuento Promocional (10%)\n";
$opcion = readline("Opción (1 o 2): ");

// 2. Definición de la estrategia según la elección del usuario
if ($opcion === "2") {
    $estrategia = new DescuentoPorcentajeStrategy(10);
} else {
    $estrategia = new SinDescuentoStrategy();
}

// 3. Instanciar servicio de venta con la estrategia seleccionada
$servicioVenta = new VentaService($estrategia);

// 4. Registrar los observadores desacoplados
$servicioVenta->adjuntar(new AuditoriaObserver());
$servicioVenta->adjuntar(new InventarioObserver());

// 5. Procesar la venta con los datos ingresados
echo "\n----------------------------------------\n";
$servicioVenta->procesarVenta($cliente, $montoSubtotal);
echo "----------------------------------------\n";