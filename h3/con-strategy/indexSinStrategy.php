<?php
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';

use App\Base\Producto;
use App\Base\DetalleVenta;
use App\Base\Venta;

echo "========================================\n";
echo "       PRUEBA SIN PATRÓN STRATEGY       \n";
echo "========================================\n\n";

$subtotal = 1000.00;
$tipoDescuento = 'porcentaje'; // Opciones: 'ninguno', 'porcentaje', 'fijo'

$descuento = 0.0;

// ACOPLAMIENTO DIRECTO: La lógica de cálculo depende de condicionales en el cliente.
// Si llega una nueva regla (ej: 'deportista' o 'temporada'), hay que ABRIR este archivo y agregar más casos.
switch ($tipoDescuento) {
    case 'porcentaje':
        $porcentaje = 10;
        $descuento = $subtotal * ($porcentaje / 100);
        break;
    case 'fijo':
        $montoFijo = 150.00;
        $descuento = min($montoFijo, $subtotal);
        break;
    case 'ninguno':
    default:
        $descuento = 0.0;
        break;
}

$total = $subtotal - $descuento;

echo "[SIN STRATEGY] Tipo: {$tipoDescuento} | Subtotal: Bs. {$subtotal} | Descuento: Bs. {$descuento} | Total: Bs. {$total}\n";