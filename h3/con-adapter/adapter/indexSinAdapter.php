<?php
require_once __DIR__ . '/ServicioBancoExterno.php';
require_once __DIR__ . '/VentaSinAdapter.php';

use App\Adapter\ServicioBancoExterno;
use App\Adapter\VentaSinAdapter;

$bancoExterno = new ServicioBancoExterno();
$venta = new VentaSinAdapter($bancoExterno);

$exito = $venta->cobrar(350.00, "VENTA-SIN-001");

if ($exito) {
    echo "[OK] Cobro realizado (pero Venta depende directamente del API del Banco).\n";
}