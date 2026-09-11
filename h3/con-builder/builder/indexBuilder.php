<?php
require_once __DIR__ . '/VentaGuardian.php';
require_once __DIR__ . '/VentaBuilderGuardian.php';

use App\Builders\VentaBuilderGuardian;

$builder = new VentaBuilderGuardian();

// --- PRUEBA 1: CONSTRUCCIÓN EXITOSA ---
echo "1. Construcción válida:\n";
try {
    $venta = $builder
        ->paraCliente("Maria Flores")
        ->agregarProducto("Impresora Termica", 1, 450.00)
        ->agregarProducto("Rollo Papel Termico", 5, 12.00)
        ->conDescuento(10.00)
        ->build();

    echo "   [OK] Venta creada exitosamente para: " . $venta->cliente . "\n";
    echo "   [OK] Total a pagar: " . $venta->total . " BS\n\n";
} catch (\Exception $e) {
    echo "   [ERROR] " . $e->getMessage() . "\n\n";
}

// --- PRUEBA 2: ACTIVACIÓN DE GUARDIÁN (CANTIDAD 0) ---
echo "2. Intento con cantidad inválida (0):\n";
try {
    $builder->reset()
        ->paraCliente("Pedro Gomez")
        ->agregarProducto("Teclado", 0, 100.00)
        ->build();
} catch (\Exception $e) {
    echo "   [CAPTURADO] " . $e->getMessage() . "\n\n";
}

// --- PRUEBA 3: ACTIVACIÓN DE GUARDIÁN (SIN PRODUCTOS) ---
echo "3. Intento de emitir venta sin productos:\n";
try {
    $builder->reset()
        ->paraCliente("Juan Perez")
        ->build();
} catch (\Exception $e) {
    echo "   [CAPTURADO] " . $e->getMessage() . "\n";
}