<?php
namespace App\Adapter;

class VentaSinAdapter {
    private ServicioBancoExterno $banco;

    public function __construct(ServicioBancoExterno $banco) {
        $this->banco = $banco;
    }

    public function cobrar(float $montoEnBs, string $codigoVenta): bool {
        // ACOPLAMIENTO DIRECTO: La venta se encarga de convertir moneda 
        // y de conocer los métodos internos del banco externo
        $montoUSD = round($montoEnBs / 6.96, 2);
        
        $respuesta = $this->banco->executeTransaction($montoUSD, $codigoVenta);
        
        return isset($respuesta['status']) && $respuesta['status'] === 'SUCCESS';
    }
}