class Orden {
    constructor(fecha, mesa, detalle, total, anulada = false) {
        this.fecha = fecha;
        this.mesa = mesa;
        this.detalle = detalle;
        this.total = total;
        this.anulada = anulada;
    }
}

module.exports = Orden;