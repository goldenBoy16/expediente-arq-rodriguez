<?php
namespace App\Config;

class SesionCaja {
    private static ?SesionCaja $instancia = null;
    private string $idSesion;
    private float $montoInicial;
    private bool $abierta;

    private function __construct() {
        $this->idSesion = "CAJA-" . date("Ymd-His");
        $this->montoInicial = 0.0;
        $this->abierta = true;
    }

    private function __clone() {}

    public function __wakeup() {
        throw new \Exception("No se puede deserializar un Singleton.");
    }

    public static function getInstancia(): SesionCaja {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function getIdSesion(): string {
        return $this->idSesion;
    }
}
