<?php
namespace Integradora\Parqueo\Patrones;

interface EstadiaObserverInterface {
    public function notificarSobrepaso24Horas(string $placa, int $horas): void;
}

class AlertaPropietarioObserver implements EstadiaObserverInterface {
    public function notificarSobrepaso24Horas(string $placa, int $horas): void {
        echo "[ALERTA AUTOMATICA] Vehiculo {$placa} supero las 24 horas (Tiempo: {$horas}h). Notificando al propietario.\n";
    }
}

class EstadiaSubject {
    private array $observadores = [];
    private int $horasTranscurridas = 0;

    public function __construct(private string $placa) {}

    public function agregarObservador(EstadiaObserverInterface $observador): void {
        $this->observadores[] = $observador;
    }

    public function incrementarTiempo(int $horas): void {
        $this->horasTranscurridas += $horas;
        if ($this->horasTranscurridas > 24) {
            $this->notificarObservadores();
        }
    }

    private function notificarObservadores(): void {
        foreach ($this->observadores as $observador) {
            $observador->notificarSobrepaso24Horas($this->placa, $this->horasTranscurridas);
        }
    }
}

echo "========================================\n";
echo "  PRUEBA DE PATRON OBSERVER (>24 HORAS)\n";
echo "========================================\n\n";

$estadia = new EstadiaSubject("1234-ABC");

$estadia->agregarObservador(new AlertaPropietarioObserver());

echo "Registrando estadía de 28 horas para la placa 1234-ABC...\n";
$estadia->incrementarTiempo(28);