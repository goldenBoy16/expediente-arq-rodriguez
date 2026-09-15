<?php

// Solucion: Alexander Carmelo Rodriguez Camcho

namespace Biblioteca\Multas;

// 1. realizo el contrato
interface MultaStrategyInterface {
    public function calcularMulta(int $diasAtraso): float;
}

// 2. tengo las estrategias

// Estrategia 1: Socio Infantil (no paga, solo bloquea)
class MultaInfantilStrategy implements MultaStrategyInterface {
    public function calcularMulta(int $diasAtraso): float {
        return 0.0;
    }
}

// Estrategia 2: Socio Adulto (2 Bs por día)
class MultaAdultoStrategy implements MultaStrategyInterface {
    public function calcularMulta(int $diasAtraso): float {
        return $diasAtraso * 2.0;
    }
}

// Estrategia 3: Socio Tercera Edad (1 Bs por día con tope de 20 Bs)
class MultaTerceraEdadStrategy implements MultaStrategyInterface {
    public function calcularMulta(int $diasAtraso): float {
        $calculo = $diasAtraso * 1.0;
        return min($calculo, 20.0);
    }
}

// Contexto / logica para el calculo de multas
class CalculadorMultaService {
    private MultaStrategyInterface $estrategia;

    public function __construct(MultaStrategyInterface $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(MultaStrategyInterface $estrategia): void {
        $this->estrategia = $estrategia;
    }

    public function obtenerMonto(int $diasAtraso): float {
        return $this->estrategia->calcularMulta($diasAtraso);
    }
}





