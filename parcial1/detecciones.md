S: 
La violacion ocurre en el principio de responsabilidad unico, en la clase GestorDePedidos y en el metodo ProcesarPedido, hay muchas responsabilidades a la vez como calcular descuentos, constantes peticiones a la base de datos, imprime comprobantes y envía notificaciones a los correos.
O: 
La violacion ocurre en el principio abierto/cerrado, para calcular los descuentos usa swich entonces al agregar un nuevo tipo de cliente se tiene que modificar el método y la clase en lugar de extender.
L - I: 
La interfaz IEmpleadoDeFerreteria y la clase Vendedor con sus metodos AutorizarVentaAlPorMayor, AjustaPrecio y VerReporteDeCompras, engloba operaciones administrativas obligando a Vendedor a implementarlas ahi es dode se lanza la excepcion esto rompe la segregacion de interfaces y la s. de liskov.
D:
En la clase GEstorDePedidos y el metodo ProcesarPedido depende directamente de implementaciones de bajo nivel que se instancian con new dentro de su logica de negocio en lugar de recibir abstracciones.
