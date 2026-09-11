Justificación de descarte del Patrón Singleton

Para la Variante 4 no se aplicara el patrón Singleton debido a:

1 Cumplimiento de DIP (Dependency Inversion Principle): Las dependencias de acceso a datos se inyectan a través de interfaces mediante el constructor (VentaRepositoryInterface), evitando instancias estáticas globales.
2 Aislamiento en Testing Unitario: Evitamos acoplar las pruebas de integridad de inventario a un estado global compartido.

Nota: El patrón únicamente se restringió a la gestión aislada de sesión física en practicas/c8/SesionCaja.php.