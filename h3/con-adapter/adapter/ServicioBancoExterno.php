<?php
namespace App\Adapter;

// Clase que simula una API de un banco externo con sus propios nombres y moneda
class ServicioBancoExterno {
    public function executeTransaction(float $amountInUSD, string $transactionRef): array {
        // Simula la llamada HTTP a la pasarela externa
        return [
            'status' => 'SUCCESS',
            'code' => 200,
            'tx_id' => 'BANK-' . rand(1000, 9999)
        ];
    }
}