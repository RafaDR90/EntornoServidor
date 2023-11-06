<?php
namespace Modelss;
use DateTime;
class Monedero {
    private string $concepto;
    private string $fecha;
    private float $importe;

    public function __construct(public array $monederos=[]) {}

    public function getMonederos() {
        return $this->monederos;
    }

    public static function inicializar(){
        return new Monedero(self::cargarMonederosDesdeArchivo('Modelss/Monederos.txt'));
    }
    private static function cargarMonederosDesdeArchivo($archivo) {
        $monederos = [];
        if (file_exists($archivo)) {
            $datos = fopen($archivo, 'r');
            if ($datos){
                while (($linea = fgets($datos))!==false){
                    list($concepto, $fecha, $importe) = explode(',', $linea);
                    $monedero = new Monedero();
                    $monedero->setConcepto($concepto);
                    $monedero->setFecha($fecha);
                    $monedero->setImporte((float)$importe);
                    $monederos[] = $monedero;
                }
            }

            fclose($datos);
        }

        return $monederos;
    }

    public function getConcepto(): string
    {
        return $this->concepto;
    }

    public function setConcepto(string $concepto): void
    {
        $this->concepto = $concepto;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getImporte(): float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): void
    {
        $this->importe = $importe;
    }


}