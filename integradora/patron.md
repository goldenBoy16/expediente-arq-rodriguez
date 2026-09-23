Seleccion y Aplicacion del Patron de Diseño

1. Requerimiento que Pide el Patron
"Cuando un vehiculo lleva mas de 24 horas, el dueño debe recibir un aviso."

2. Patron Aplicado
Observer (Observador) en PHP para la gestion desacoplada de notificaciones automaticas por sobrepaso de tiempo.

3. Justificacion Tecnica
Por que ese patron: El requerimiento exige reaccionar al paso del tiempo y emitir avisos cuando se superen las 24 horas de estadia. El patron Observer permite registrar observadores (AlertaPropietarioObserver) sin acoplar la clase EstadiaSubject a servicios de mensajeria concretos.
Que pasa sin el: La clase encargada de la estadia tendria llamadas directas a servicios de notificacion de terceros dentro de sus condicionales de tiempo, violando el principio SRP y OCP cada vez que la administracion pida agregar un nuevo canal de aviso (ej. email o notificacion interna al portero).