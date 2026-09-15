<?php

// Solucion: Alexander Carmelo Rodriguez Camcho

namespace Biblioteca\Multas;

// 1. realizo el contrato
interface MultaStrategyInterface {
    public function calcularMulta(int $diasAtraso): float;
}



