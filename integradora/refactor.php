<?php
// Refactor: Alexander Rodríguez Camacho
// usare php para la curar el principio de inversion de dependencias mediante inyeccion de dependencia.
// incorporare entrada dinámica por teclado.

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
        $tarifaPorHora = match (strtolower($tipoVehiculo)) {
            'auto' => 5.0,
            'moto' => 3.0,
            'residente' => 1.0,
            default => 5.0,
        };

        $total = $tarifaPorHora * $horas;

        $this->baseDeDatos->guardarEstadia($placa, $tipoVehiculo, $horas, $total);

        echo "\n----------------------------------------\n";
        echo "        TICKET DE SALIDA PARQUEO        \n";
        echo "----------------------------------------\n";
        echo "Placa: {$placa}\n";
        echo "Tipo Vehículo: {$tipoVehiculo}\n";
        echo "Tiempo Permanencia: {$horas} hora(s)\n";
        echo "Tarifa por hora: " . number_format($tarifaPorHora, 2) . " Bs\n";
        echo "TOTAL A PAGAR: " . number_format($total, 2) . " Bs\n";
        echo "----------------------------------------\n\n";

        $this->notificador->enviar("Salida registrada: {$placa}, {$horas} hrs, Vehiculo {$tipoVehiculo}, Total: " . number_format($total, 2) . " Bs");
    }
}

echo "========================================\n";
echo "  SISTEMA DE PARQUEO TORRE CENTRAL CLI  \n";
echo "========================================\n\n";

$placaInput = readline("Ingrese la placa del vehículo (ej. 1234-ABC): ");
$placa = !empty(trim($placaInput)) ? trim($placaInput) : "1234-ABC";

echo "Seleccione tipo de vehículo:\n";
echo "1. Auto (5.00 Bs/h)\n";
echo "2. Moto (3.00 Bs/h)\n";
echo "3. Residente (1.00 Bs/h)\n";
$opcionTipo = readline("Opción (1-3) [Defecto 1]: ");

$tipoVehiculo = match (trim($opcionTipo)) {
    '2' => 'moto',
    '3' => 'residente',
    default => 'auto',
};

$horasInput = readline("Ingrese la cantidad de horas estacionado: ");
$horas = max(1, intval($horasInput));

$bd = new BaseDeDatosParqueo();
$notificador = new WhatsAppDelEdificio();
$gestor = new GestorDeEstadias($bd, $notificador);

$gestor->registrarSalida($placa, $tipoVehiculo, $horas);