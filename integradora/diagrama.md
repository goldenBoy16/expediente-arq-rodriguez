```mermaid
classDiagram
    class Portero {
        +registrarEntrada(placa: string, tipo: string): Estadia
        +registrarSalida(estadiaId: string): void
    }

    class Administrador {
        +ajustarTarifas(tipo: string, nuevaTarifa: float): void
        +anularEstadia(estadiaId: string): void
        +generarReporteIngresos(): array
    }

    class Estadia {
        -id: string
        -placa: string
        -horaEntrada: DateTime
        -horaSalida: DateTime
        -estado: string
        -montoTotal: float
        +calcularHoras(): int
        +marcarComoPagada(): void
        +esLargaEstadia(): bool
    }

    class Vehiculo {
        <<abstract>>
        -placa: string
        +getTarifaHora()*: float
    }

    class Auto {
        +getTarifaHora(): float
    }

    class Moto {
        +getTarifaHora(): float
    }

    class Residente {
        +getTarifaHora(): float
    }

    class EstadiaObserverInterface {
        <<interface>>
        +notificarSobrepaso24Horas(placa: string, horas: int): void
    }

    class AlertaPropietarioObserver {
        +notificarSobrepaso24Horas(placa: string, horas: int): void
    }

    Vehiculo <|-- Auto
    Vehiculo <|-- Moto
    Vehiculo <|-- Residente

    Portero ..> Estadia : gestiona
    Administrador ..> Estadia : anula/reporta
    Estadia --> Vehiculo : pertenece_a
    Estadia ..> EstadiaObserverInterface : notifica
    EstadiaObserverInterface <|.. AlertaPropietarioObserver : implementa
    ```