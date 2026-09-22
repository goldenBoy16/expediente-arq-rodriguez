Deteccion de Violaciones SOLID
1. Violacion de Principio de responsabilidad unica  
Donde: Metodo registrarSalida() de la clase gestora.
Por que: Mezcla en un solo metodo el calculo de tarifas (negocio), la simulacion de escritura en base de datos (persistencia), la salida por consola (presentacion) y la notificacion por WhatsApp (comunicacion externa).

2. Violacion del Principio Abierto Cerrado
Donde: Evaluacion por tipo de vehiculo (switch / match).
Por que: Si el parqueo incorpora un nuevo tipo de vehiculo (ej. camion o bicicleta), es obligatorio modificar el codigo de la clase gestora en lugar de extender el sistema agregando una nueva clase.

3. Violacion del Principio de inversion de dependencias
Donde: Instanciacion directa con new BaseDeDatosParqueo() y new WhatsAppDelEdificio().
Por que: El modulo de alto nivel depende directamente de clases concretas de bajo nivel en lugar de depender de abstracciones e interfaces (BaseDeDatosInterface y ServicioNotificacionInterface).