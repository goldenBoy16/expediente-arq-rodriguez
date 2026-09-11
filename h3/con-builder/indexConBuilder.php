<?php
// 1. Cargar las clases base del dominio
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';

// 2. Cargar las clases del patrón Builder con Guard Clauses
require_once __DIR__ . '/VentaGuardian.php';
require_once __DIR__ . '/VentaBuilderGuardian.php';

use App\Builders\VentaBuilderGuardian;

$builder = new VentaBuilderGuardian();

echo "========================================\n";
echo "       PRUEBA CON PATRÓN BUILDER        \n";
echo "========================================\n\n";

// --- PRUEBA 1: CONSTRUCCIÓN EXITOSA ---
echo "1. Construcción válida con datos correctos:\n";
try {
    $venta = $builder
        ->paraCliente("María Flores")
        ->agregarProducto("Impresora Térmica", 1, 450.00)
        ->agregarProducto("Rollo Papel Térmico", 5, 12.00)
        ->conDescuento(10.00)
        ->build();

    echo "   [OK] Venta creada exitosamente para: " . $venta->cliente . "\n";
    echo "   [OK] Total a pagar: Bs. " . $venta->total . "\n\n";
} catch (\Exception $e) {
    echo "   [ERROR] " . $e->getMessage() . "\n\n";
}

// --- PRUEBA 2: ACTIVACIÓN DE GUARDIÁN (CANTIDAD 0) ---
echo "2. Intento de agregar producto con cantidad inválida (0):\n";
try {
    $builder->reset()
        ->paraCliente("Pedro Gómez")
        ->agregarProducto("Teclado", 0, 100.00)
        ->build();
} catch (\Exception $e) {
    echo "   [CAPTURADO] " . $e->getMessage() . "\n\n";
}

// --- PRUEBA 3: ACTIVACIÓN DE GUARDIÁN ESTRUCTURAL (SIN PRODUCTOS) ---
echo "3. Intento de emitir venta sin productos cargados:\n";
try {
    $builder->reset()
        ->paraCliente("Juan Pérez")
        ->build();
} catch (\Exception $e) {
    echo "   [CAPTURADO] " . $e->getMessage() . "\n";
}