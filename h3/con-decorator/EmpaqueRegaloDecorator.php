<?php
namespace App\Decorator;

require_once __DIR__ . '/ComprobanteDecorator.php';

class EmpaqueRegaloDecorator extends ComprobanteDecorator {
    public function getDescripcion(): string {
        return parent::getDescripcion() . " + Empaque para Regalo";
    }

    public function getCosto(): float {
        return parent::getCosto() + 5.00; // Recargo fijo de 5 Bs
    }
}