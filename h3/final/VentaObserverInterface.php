<?php
namespace App\Final;

interface VentaObserverInterface {
    public function actualizar(string $evento, array $datos): void;
}