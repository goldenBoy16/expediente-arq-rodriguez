<?php
namespace App\Decorator;

interface ComprobanteInterface {
    public function getDescripcion(): string;
    public function getCosto(): float;
}