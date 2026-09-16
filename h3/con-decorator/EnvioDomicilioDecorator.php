<?php
namespace App\Decorator;

require_once __DIR__ . '/ComprobanteDecorator.php';

class EnvioDomicilioDecorator extends ComprobanteDecorator {
    public function getDescripcion(): string {
        return parent::getDescripcion() . " + Envío a Domicilio";
    }

    public function getCosto(): float {
        return parent::getCosto() + 15.00; // Recargo fijo de 15 Bs
    }
}