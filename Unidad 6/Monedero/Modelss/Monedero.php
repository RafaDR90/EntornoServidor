<?php
namespace Modelss;
use DateTime;
class Monedero {
    private string $concepto;
    private date $fecha;
    private float $importe;

    public function __construct() {
        $this->monederos = $this->cargarMonederosDesdeArchivo('Modelss/Monederos.txt');
    }

    public function getMonederos() {
        return $this->monederos;
    }
    private function cargarMonederosDesdeArchivo($archivo) {
        $monederos = [];
        if (file_exists($archivo)) {
            $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lineas as $linea) {
                list($concepto, $fecha, $importe) = explode(',', $linea);
                var_dump($fecha);
                $fechaObj = new date($fecha);
                $monedero = new Monedero();
                $monedero->setConcepto($concepto);
                $monedero->setFecha($fechaObj);
                $monedero->setImporte((float)$importe);
                $monederos[] = $monedero;
            }
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

    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha): void
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