<?php
require_once __DIR__ . '/Venta.php';
require_once __DIR__ . '/VentaBuilder.php';

use App\Builders\VentaBuilder;

$builder = new VentaBuilder();

// Construcción fluida de una venta compleja
$venta = $builder
    ->paraCliente("Juan Pérez")
    ->agregarProducto("Laptop HP", 1, 3500.00)
    ->agregarProducto("Mouse Inalámbrico", 2, 80.00)
    ->conDescuento(100.00)
    ->build();

echo "Venta creada exitosamente para: " . $venta->cliente . "\n";
echo "Total a pagar: " . $venta->total . " BS\n";