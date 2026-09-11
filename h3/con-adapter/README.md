Patrón Adapter
Sistema Externo
ServicioBancoExterno: Pasarela bancaria que opera en dólares (USD) y utiliza métodos con nombres ajenos a nuestra arquitectura (executeTransaction).
Contrato 
ProcesadorPagoInterface: Contrato propio del dominio de la tienda para procesar cobranzas en Bolivianos (procesarPago).
Traductor (PasarelaPagoAdapter)
Clase encargada de convertir los montos de Bs a USD según la tasa de cambio y mapear la firma de nuestros métodos con las exigencias de la API externa sin contaminar el código del negocio.
