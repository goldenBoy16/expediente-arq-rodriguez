<?php
namespace App\Observer;

require_once __DIR__ . '/Venta.php';

interface VentaObserverInterface {
    public function actualizar(\App\Base\Venta $venta): void;
}