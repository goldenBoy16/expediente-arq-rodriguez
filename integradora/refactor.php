<?php
// Refactor: Alexander Carmelo Rodriguez Camcaho
// usare php para la curar el principio de inversion de dependencias mediante inyeccion de dependencia.

namespace Integradora\Parqueo;

interface BaseDeDatosInterface {
    public function guardarEstadia(string $placa, string $tipo, int $horas, float $total): void;
}

interface ServicioNotificacionInterface {
    public function enviar(string $mensaje): void;
}

class BaseDeDatosParqueo implements BaseDeDatosInterface {
    public function guardarEstadia(string $placa, string $tipo, int $horas, float $total): void {
        echo "[BD] INSERT INTO estadias VALUES ('{$placa}', '{$tipo}', {$horas}, {$total})\n";
    }
}

class WhatsAppDelEdificio implements ServicioNotificacionInterface {
    public function enviar(string $mensaje): void {
        echo "[WHATSAPP] {$mensaje}\n";
    }
}

class GestorDeEstadias {
    public function __construct(
        private BaseDeDatosInterface $baseDeDatos,
        private ServicioNotificacionInterface $notificador
    ) {}

    public function registrarSalida(string $placa, string $tipoVehiculo, int $horas): void {
        $tarifaPorHora = match ($tipoVehiculo) {
            'auto' => 5.0,
            'moto' => 3.0,
            'residente' => 1.0,
            default => 5.0,
        };

        $total = $tarifaPorHora * $horas;

        $this->baseDeDatos->guardarEstadia($placa, $tipoVehiculo, $horas, $total);

        echo "----- TICKET DE SALIDA -----\n";
        echo "Placa {$placa}: {$horas} h como {$tipoVehiculo}\n";
        echo "TOTAL: " . number_format($total, 2) . " Bs\n";

        $this->notificador->enviar("Salida registrada: {$placa}, {$horas} h, " . number_format($total, 2) . " Bs");
    }
}

$bd = new BaseDeDatosParqueo();
$notificador = new WhatsAppDelEdificio();
$gestor = new GestorDeEstadias($bd, $notificador);
$gestor->registrarSalida("1234-ABC", "auto", 3);