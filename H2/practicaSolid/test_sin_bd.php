<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', substr($class, 4)) . '.php';
    if (file_exists($file)) require $file;
});

use App\Models\{Cliente, Vendedor, Categoria, Producto, Venta};
use App\Repositories\InMemoryVentaRepository;
use App\Services\VentaService;

echo "=========================================================\n";
echo " TEST 1: Prueba de Regla de Negocio SIN Base de Datos\n";
echo "=========================================================\n\n";

$cliente = new Cliente(1, "Carlos", "Mendoza", "Av. Principal 123", "71234567");
$vendedor = new Vendedor(2, "Ana", "Gomez", "Calle Central 456", "77654321", "agomez", "123");
$categoria = new Categoria(1, "Laptops", "Equipos portátiles");
$laptop = new Producto(101, "Laptop Lenovo", 850.00, 10);

$venta = new Venta($cliente, $vendedor);
$venta->agregarDetalle($laptop, 2);

// Inyectamos el Repositorio en Memoria
$repoEnMemoria = new InMemoryVentaRepository();
$service = new VentaService($repoEnMemoria);

$exito = $service->procesarVenta($venta);

if ($exito && count($repoEnMemoria->ventasGuardadas) === 1) {
    echo ">>> ¡PRUEBA PASADA EXITOSAMENTE! <<<\n";
    echo "✔ Venta procesada e ID asignado: " . $venta->getIdVenta() . "\n";
    echo "✔ Total de venta: $" . $venta->getTotal() . "\n";
    echo "✔ Stock restante de Laptop: " . $laptop->getStock() . "\n";
    echo "✔ Se probó la regla SIN estar conectado a una BD real.\n";
}
echo "=========================================================\n";