<?php
require_once __DIR__ . '/ProcesadorPagoInterface.php';
require_once __DIR__ . '/ServicioBancoExterno.php';
require_once __DIR__ . '/PasarelaPagoAdapter.php';

use App\Adapter\ServicioBancoExterno;
use App\Adapter\PasarelaPagoAdapter;

// 1. Instanciar la API de la pasarela externa
$apiBanco = new ServicioBancoExterno();

// 2. Envolverla en nuestro Adaptador
$procesadorDePago = new PasarelaPagoAdapter($apiBanco, 6.96);

// 3. El sistema opera usando el contrato nativo en Bolivianos
$montoVentaBs = 350.00;
$codigoVenta = "VENTA-2026-001";

echo "Procesando cobro de Bs. {$montoVentaBs} para {$codigoVenta}...\n";

if ($procesadorDePago->procesarPago($montoVentaBs, $codigoVenta)) {
    echo "[ÉXITO] El pago fue traducido y aceptado por la pasarela externa.\n";
} else {
    echo "[ERROR] Falló la transacción en la pasarela externa.\n";
}