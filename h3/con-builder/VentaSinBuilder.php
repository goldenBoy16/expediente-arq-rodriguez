<?php
namespace App\Builder;

require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/DetalleVenta.php';
require_once __DIR__ . '/Venta.php';

use App\Base\Venta;

class VentaSinBuilder {
    public static function crearVentaDirecta(string $cliente): Venta {
        // Se crea el objeto de golpe sin validaciones previas de negocio
        return new Venta($cliente);
    }
}