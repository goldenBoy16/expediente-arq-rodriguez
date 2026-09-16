<?php
require_once __DIR__ . '/ComprobanteInterface.php';
require_once __DIR__ . '/VentaBase.php';
require_once __DIR__ . '/ComprobanteDecorator.php';
require_once __DIR__ . '/EnvioDomicilioDecorator.php';
require_once __DIR__ . '/EmpaqueRegaloDecorator.php';

use App\Decorator\VentaBase;
use App\Decorator\EnvioDomicilioDecorator;
use App\Decorator\EmpaqueRegaloDecorator;

echo "========================================\n";
echo "      PRUEBA PATRÓN DECORATOR           \n";
echo "========================================\n\n";

// COMBINACIÓN 1: Venta Base (Bs. 100) + Envío a Domicilio
$combinacion1 = new EnvioDomicilioDecorator(new VentaBase(100.00));
echo "[COMBINACIÓN 1]: " . $combinacion1->getDescripcion() . "\n";
echo "TOTAL: Bs. " . $combinacion1->getCosto() . "\n\n";

// COMBINACIÓN 2: Venta Base (Bs. 200) + Envío a Domicilio + Empaque para Regalo (Envoltorios Anidados)
$combinacion2 = new EmpaqueRegaloDecorator(
    new EnvioDomicilioDecorator(
        new VentaBase(200.00)
    )
);
echo "[COMBINACIÓN 2]: " . $combinacion2->getDescripcion() . "\n";
echo "TOTAL: Bs. " . $combinacion2->getCosto() . "\n";