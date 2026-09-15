<?php
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';
require_once __DIR__ . '/AuditoriaObserver.php';
require_once __DIR__ . '/InventarioObserver.php';

use App\Base\Producto;
use App\Base\DetalleVenta;
use App\Base\Venta;
use App\Observer\AuditoriaObserver;
use App\Observer\InventarioObserver;

echo "========================================\n";
echo "       PRUEBA SIN PATRÓN OBSERVER       \n";
echo "========================================\n\n";

$venta = new Venta("María Flores");
$prod = new Producto("P-02", "Impresora Térmica", 450.00, 5, 1);
$venta->agregarDetalle(new DetalleVenta($prod, 1));

// ACOPLAMIENTO DIRECTO: El script conoce y llama una por una a las dependencias[cite: 2]
echo "[SISTEMA] Procesando venta manualmente...\n";
$auditoria = new AuditoriaObserver();
$auditoria->actualizar($venta);

$inventario = new InventarioObserver();
$inventario->actualizar($venta);

// Si llega un nuevo interesado (ej: Facturación), hay que modificar este script para llamarlo[cite: 2].