<?php
namespace App\Builders;

use App\Modelos\Venta;

class VentaBuilder {
    private Venta $venta;

    public function __construct() {
        $this->reset();
    }

    public function reset(): self {
        $this->venta = new Venta();
        return $this;
    }

    // Paso 1: Asignar Cliente
    public function paraCliente(string $cliente): self {
        $this->venta->cliente = $cliente;
        return $this;
    }

    // Paso 2: Agregar producto/detalle con verificación de cantidad
    public function agregarProducto(string $producto, int $cantidad, float $precioUnitario): self {
        // Validación del guardián
        if ($cantidad <= 0) {
            throw new \InvalidArgumentException("La cantidad debe ser mayor a cero.");
        }

        $this->venta->detalles[] = [
            'producto' => $producto,
            'cantidad' => $cantidad,
            'precioUnitario' => $precioUnitario,
            'subtotal' => $cantidad * $precioUnitario
        ];
        return $this;
    }

    // Paso 3: Aplicar Descuento
    public function conDescuento(float $descuento): self {
        if ($descuento < 0) {
            throw new \InvalidArgumentException("El descuento no puede ser negativo.");
        }
        $this->venta->descuento = $descuento;
        return $this;
    }

    // Paso 4: Establecer Estado
    public function conEstado(string $estado): self {
        $this->venta->estado = $estado;
        return $this;
    }

    // Construcción final con las 2 Validaciones del Guardián
    public function build(): Venta {
        // Validación 1 del guardián: La venta debe tener un cliente asignado
        if (empty($this->venta->cliente)) {
            throw new \LogicException("No se puede emitir una venta sin registrar un cliente.");
        }

        // Validación 2 del guardián: La venta debe contener al menos 1 producto
        if (count($this->venta->detalles) === 0) {
            throw new \LogicException("No se puede emitir una venta vacía sin productos.");
        }

        $this->venta->calcularTotal();
        $resultado = $this->venta;
        $this->reset(); // Limpiar para el siguiente armado

        return $resultado;
    }
}