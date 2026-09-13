<?php
namespace App\Factory;

require_once __DIR__ . '/NotificacionInterface.php';

class ImprimirTicketNotificacion implements NotificacionInterface {
    public function enviar(string $mensaje): bool {
        echo "[IMPRESORA] Imprimiendo ticket de venta en POS local...\n";
        echo "--------------------------------------------------------\n";
        echo "COMPROBANTE: " . $mensaje . "\n";
        echo "--------------------------------------------------------\n";

        return true;
    }
}