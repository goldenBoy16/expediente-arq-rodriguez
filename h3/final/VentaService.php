<?php
namespace App\Final;

require_once __DIR__ . '/DescuentoStrategyInterface.php';
require_once __DIR__ . '/VentaObserverInterface.php';

class VentaService {
    private array $observadores = [];

    public function __construct(private DescuentoStrategyInterface $estrategiaDescuento) {}

    public function setEstrategiaDescuento(DescuentoStrategyInterface $estrategia): void {
        $this->estrategiaDescuento = $estrategia;
    }

    public function adjuntar(VentaObserverInterface $observador): void {
        $this->observadores[] = $observador;
    }

    public function notificar(string $evento, array $datos): void {
        foreach ($this->observadores as $observador) {
            $observador->actualizar($evento, $datos);
        }
    }

    public function procesarVenta(string $cliente, float $montoSubtotal): void {
        $descuento = $this->estrategiaDescuento->calcularDescuento($montoSubtotal);
        $montoFinal = $montoSubtotal - $descuento;

        echo "Procesando venta para: {$cliente}\n";
        echo "Subtotal: Bs. " . number_format($montoSubtotal, 2) . "\n";
        echo "Descuento Aplicado: Bs. " . number_format($descuento, 2) . "\n";
        echo "Total A Pagar: Bs. " . number_format($montoFinal, 2) . "\n";

        $this->notificar("VENTA_REALIZADA", [
            'cliente' => $cliente,
            'montoSubtotal' => $montoSubtotal,
            'descuento' => $descuento,
            'montoFinal' => $montoFinal
        ]);
    }
}