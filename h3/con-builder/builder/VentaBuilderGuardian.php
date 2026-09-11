<?php
namespace App\Builders;

use App\Modelos\VentaGuardian;

class VentaBuilderGuardian {
    private VentaGuardian $venta;

    public function __construct() {
        $this->reset();
    }

    public function reset(): self {
        $this->venta = new VentaGuardian();
        return $this;
    }

    // Paso 1: Asignar Cliente con Guardián
    public function paraCliente(string $cliente): self {
        if (trim($cliente) === '') {
            throw new \InvalidArgumentException("Guardián: El nombre del cliente es obligatorio.");
        }

        $this->venta->cliente = trim($cliente);
        return $this;
    }

    // Paso 2: Agregar Producto con Guardiones de entrada
    public function agregarProducto(string $producto, int $cantidad, float $precioUnitario): self {
        if ($cantidad <= 0) {
            throw new \InvalidArgumentException("Guardián: La cantidad debe ser mayor a 0.");
        }

        if ($precioUnitario <= 0) {
            throw new \InvalidArgumentException("Guardián: El precio unitario debe ser mayor a 0.");
        }

        $this->venta->detalles[] = [
            'producto' => trim($producto),
            'cantidad' => $cantidad,
            'precioUnitario' => $precioUnitario,
            'subtotal' => $cantidad * $precioUnitario
        ];
        return $this;
    }

    // Paso 3: Aplicar Descuento con Guardián
    public function conDescuento(float $descuento): self {
        if ($descuento < 0) {
            throw new \InvalidArgumentException("Guardián: El descuento no puede ser negativo.");
        }

        $this->venta->descuento = $descuento;
        return $this;
    }

    // Paso 4: Construcción Final con Guardiones de Dominio
    public function build(): VentaGuardian {
        // Guardián 1: Cliente obligatorio
        if ($this->venta->cliente === null) {
            throw new \LogicException("Guardián Estructural: No se puede generar una venta sin cliente.");
        }

        // Guardián 2: Al menos un producto
        if (empty($this->venta->detalles)) {
            throw new \LogicException("Guardián Estructural: No se puede generar una venta sin productos.");
        }

        $this->venta->calcularTotal();

        // Guardián 3: Total no negativo
        if ($this->venta->total < 0) {
            throw new \DomainException("Guardián de Negocio: El descuento supera el monto total de la venta.");
        }

        $resultado = $this->venta;
        $this->reset();

        return $resultado;
    }
}