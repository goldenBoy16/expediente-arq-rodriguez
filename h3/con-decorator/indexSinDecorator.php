<?php
require_once __DIR__ . '/VentaBase.php';

use App\Decorator\VentaBase;

echo "========================================\n";
echo "      PRUEBA SIN PATRÓN DECORATOR       \n";
echo "========================================\n\n";

$montoBase = 200.00;

// ACOPLAMIENTO Y BANDERAS MANUALES:
// Para combinar agregados sin Decorator, se requiere evaluar banderas rígidas 
// o crear subclases para cada combinación (VentaConEnvio, VentaConEnvioYRegalo, etc.)
$incluyeEnvio = true;
$incluyeRegalo = true;

$descripcion = "Venta Base";
$costoTotal = $montoBase;

if ($incluyeEnvio) {
    $descripcion .= " + Envío a Domicilio";
    $costoTotal += 15.00;
}

if ($incluyeRegalo) {
    $descripcion .= " + Empaque para Regalo";
    $costoTotal += 5.00;
}

echo "[SIN DECORATOR]: " . $descripcion . "\n";
echo "TOTAL: Bs. " . $costoTotal . "\n";