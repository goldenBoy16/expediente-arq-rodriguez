Variante Tienda
Objeto Complejo
Venta: requiere construir un encabezado de cliente, validar la inserción de múltiples ítems de stock, aplicar reglas de descuento y verificar movimientos financieros.
Pasos para implementar
1.paraCliente(): Asigna el receptor de la venta.
2.agregarProducto(): Incorpora un detalle de venta con cálculo de subtotal.
3.conDescuento(): Aplica la deducción promocional.
4.conEstado(): Define el estado inicial de la transacción.
Validaciones del Guardián en build()
1. Verificación de cliente obligatorio (evita ventas anónimas o nulas).
2. Verificación de lista de productos no vacía (impide procesar carritos en cero).
