<?php
namespace App\Adapter;

class PasarelaPagoAdapter implements ProcesadorPagoInterface {
    private ServicioBancoExterno $bancoExterno;
    private float $tipoDeCambio;

    public function __construct(ServicioBancoExterno $bancoExterno, float $tipoDeCambio = 6.96) {
        $this->bancoExterno = $bancoExterno;
        $this->tipoDeCambio = $tipoDeCambio;
    }

    // Traducción del método nativo al formato de la API externa
    public function procesarPago(float $montoEnBolivianos, string $referenciaVenta): bool {
        // 1. Traducción de datos (Conversión de Bolivianos a USD)
        $montoUSD = round($montoEnBolivianos / $this->tipoDeCambio, 2);

        // 2. Llamada al método con nombres de la librería externa
        $respuesta = $this->bancoExterno->executeTransaction($montoUSD, $referenciaVenta);

        // 3. Traducción del resultado externo a un formato nativo (bool)
        return isset($respuesta['status']) && $respuesta['status'] === 'SUCCESS';
    }
}