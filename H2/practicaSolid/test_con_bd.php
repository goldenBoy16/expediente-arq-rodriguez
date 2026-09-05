<?php
// Autoload manual para cargar las clases de la carpeta src/
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Venta;
use App\Repositories\MySqlVentaRepository;
use App\Services\VentaService;

echo "=========================================================\n";
echo " TEST 2: Probando con la Implementación Concreta MySQL\n";
echo "=========================================================\n\n";

// 1. Instanciar Entidades
$cliente = new Cliente(1, "Maria", "Lopez", "Calle 10 #45", "65432100");
$vendedor = new Vendedor(2, "Juan", "Perez", "Av. Central 89", "61112233", "jperez", "qwerty");
$categoria = new Categoria(2, "Celulares", "Smartphones");
$phone = new Producto(102, "Samsung Galaxy", 400.00, 5);

// 2. Crear Venta
$venta = new Venta($cliente, $vendedor);
$venta->agregarDetalle($phone, 1);

// 3. INYECCIÓN DE DEPENDENCIAS:
// Pasamos el repositorio de MySQL al servicio. VentaService acepta MySqlVentaRepository
// porque implementa la interfaz VentaRepositoryInterface.
$mySqlRepo = new MySqlVentaRepository();
$ventaService = new VentaService($mySqlRepo);

// 4. Ejecutar Negocio
echo "Procesando venta mediante el servicio con persistencia MySQL...\n";
$exito = $ventaService->procesarVenta($venta);

// 5. Verificación
if ($exito) {
    echo "\n>>> ¡PERSISTENCIA EN MYSQL SIMULADA CON ÉXITO! <<<\n";
    echo "✔ Estado final de la venta: " . $venta->getEstado() . "\n";
    echo "✔ Total cobrado: $" . $venta->getTotal() . "\n";
    echo "✔ ID asignado por MySQL: " . $venta->getIdVenta() . "\n";
}
echo "=========================================================\n";