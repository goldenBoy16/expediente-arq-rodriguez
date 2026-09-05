<?php
namespace App\Models;

class Venta {
    private ?int $idVenta = null;
    private string $estado = 'PENDIENTE';
    private float $total = 0.0;
    private Cliente $cliente;
    private Vendedor $vendedor;
    private array $detalles = [];

    public function __construct(Cliente $cliente, Vendedor $vendedor) {
        $this->cliente = $cliente;
        $this->vendedor = $vendedor;
    }

    public function agregarDetalle(Producto $producto, int $cantidad): void {
        $this->detalles[] = new DetalleVenta($producto, $cantidad);
        $this->calcularTotal();
    }

    public function calcularTotal(): float {
        $this->total = 0.0;
        foreach ($this->detalles as $detalle) {
            $this->total += $detalle->getSubTotal();
        }
        return $this->total;
    }

    public function cambiarEstado(string $nuevoEstado): void { $this->estado = $nuevoEstado; }
    public function setIdVenta(int $id): void { $this->idVenta = $id; }
    public function getIdVenta(): ?int { return $this->idVenta; }
    public function getEstado(): string { return $this->estado; }
    public function getTotal(): float { return $this->total; }
    public function getDetalles(): array { return $this->detalles; }
}