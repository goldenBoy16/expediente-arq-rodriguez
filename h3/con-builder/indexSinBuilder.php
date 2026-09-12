<?php
require_once __DIR__ . '/VentaSinBuilder.php';

// Creación directa sin pasar por el guardián de reglas
$ventaDirecta = \App\Builder\VentaSinBuilder::crearVentaDirecta(""); // Cliente vacío permitido por error

echo "[RIESGO] Venta creada sin validación para el cliente: '" . $ventaDirecta->cliente . "'\n";
echo "[RIESGO] Total inicial de la venta: Bs. " . $ventaDirecta->total . " (Venta emitida sin productos)\n";