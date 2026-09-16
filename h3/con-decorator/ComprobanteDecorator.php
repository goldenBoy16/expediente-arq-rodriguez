<?php
namespace App\Decorator;

require_once __DIR__ . '/ComprobanteInterface.php';

abstract class ComprobanteDecorator implements ComprobanteInterface {
    public function __construct(protected ComprobanteInterface $comprobante) {}

    public function getDescripcion(): string {
        return $this->comprobante->getDescripcion();
    }

    public function getCosto(): float {
        return $this->comprobante->getCosto();
    }
}