<?php
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';
require_once __DIR__ . '/DescuentoStrategyInterface.php';
require_once __DIR__ . '/SinDescuento.php';
require_once __DIR__ . '/DescuentoPorcentaje.php';
require_once __DIR__ . '/DescuentoFijo.php';

use App\Base\Producto;
use App\Base\DetalleVenta;
use App\Base\Venta;
use App\Strategy\DescuentoPorcentaje;
use App\Strategy\DescuentoFijo;

echo "========================================\n";
echo "       PRUEBA CON PATRÓN STRATEGY       \n";
echo "========================================\n\n";

$prod = new Producto("P-01", "Laptop HP", 1000.00, 10, 2);

// Caso 1: Venta con Estrategia de 10% de Descuento
$estrategiaPorcentaje = new DescuentoPorcentaje(10);
$subtotal = 1000.00;
$descuento1 = $estrategiaPorcentaje->calcularDescuento($subtotal);
echo "[STRATEGY 10%] Subtotal: Bs. {$subtotal} | Descuento: Bs. {$descuento1} | Total: Bs. " . ($subtotal - $descuento1) . "\n";

// Caso 2: Venta con Estrategia de Descuento Fijo de Bs. 150
$estrategiaFija = new DescuentoFijo(150.00);
$descuento2 = $estrategiaFija->calcularDescuento($subtotal);
echo "[STRATEGY FIJO] Subtotal: Bs. {$subtotal} | Descuento: Bs. {$descuento2} | Total: Bs. " . ($subtotal - $descuento2) . "\n";