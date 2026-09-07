namespace Parcial1.Ferreteria;

// CURA 1:

public interface IRegistradorDePedidos
{
    void RegistrarPedido(string material, int cantidad);
}

public interface IGestorAdministrativo
{
    void AutorizarVentaAlPorMayor(string material);
    void AjustarPrecio(string material, decimal nuevoPrecio);
    void VerReporteDeCompras();
}

public class Encargado : IRegistradorDePedidos, IGestorAdministrativo
{
    public void RegistrarPedido(string material, int cantidad)
        => Console.WriteLine($"[ENC] Pedido: {cantidad} x {material}");

    public void AutorizarVentaAlPorMayor(string material)
        => Console.WriteLine($"[ENC] Venta al por mayor de {material} autorizada");

    public void AjustarPrecio(string material, decimal nuevoPrecio)
        => Console.WriteLine($"[ENC] {material} ahora cuesta {nuevoPrecio:0.00} Bs");

    public void VerReporteDeCompras()
        => Console.WriteLine("[ENC] Reporte de compras del mes");
}

public class Vendedor : IRegistradorDePedidos
{
    public void RegistrarPedido(string material, int cantidad)
        => Console.WriteLine($"[VEND] Pedido: {cantidad} x {material}");
}

// CURA 2:

public interface IRepositorioPedidos
{
    void GuardarPedido(string cliente, string material, int cantidad, decimal total);
}

public interface IServicioNotificacion
{
    void Enviar(string mensaje);
}

public class BaseDeDatosMySql : IRepositorioPedidos
{
    public void GuardarPedido(string cliente, string material, int cantidad, decimal total)
        => Console.WriteLine($"[MYSQL] INSERT INTO pedidos VALUES ('{cliente}', '{material}', {cantidad}, {total})");
}

public class CorreoSmtp : IServicioNotificacion
{
    public void Enviar(string mensaje)
        => Console.WriteLine($"[SMTP] {mensaje}");
}

public class GestorDePedidos
{
    private readonly IRepositorioPedidos _repositorio;
    private readonly IServicioNotificacion _notificacion;

    public GestorDePedidos(IRepositorioPedidos repositorio, IServicioNotificacion notificacion)
    {
        _repositorio = repositorio;
        _notificacion = notificacion;
    }

    public void ProcesarPedido(string cliente, string tipoCliente, string material, int cantidad, decimal precioUnitario)
    {
        decimal total = cantidad * precioUnitario;

        decimal descuento;
        switch (tipoCliente)
        {
            case "particular":
                descuento = 0;
                break;
            case "contratista":
                descuento = total * 0.15m;
                break;
            case "constructora":
                descuento = total * 0.25m;
                break;
            default:
                descuento = 0;
                break;
        }
        decimal totalFinal = total - descuento;

        _repositorio.GuardarPedido(cliente, material, cantidad, totalFinal);

        Console.WriteLine("----- COMPROBANTE -----");
        Console.WriteLine($"{cantidad} x {material}");
        Console.WriteLine($"Cliente: {cliente} ({tipoCliente})");
        Console.WriteLine($"TOTAL: {totalFinal:0.00} Bs");

        _notificacion.Enviar($"Su pedido de {material} fue registrado, {cliente}");
    }
}

public static class Demo
{
    public static void Correr()
    {
        IRepositorioPedidos repo = new BaseDeDatosMySql();
        IServicioNotificacion correo = new CorreoSmtp();

        var gestor = new GestorDePedidos(repo, correo);
        gestor.ProcesarPedido("Marco", "contratista", "Cemento 50kg", 10, 62.00m);
    }
}
