<?php
namespace Modelss;
use DateTime;
class Monedero {
    private string $concepto;
    private string $fecha;
    private float $importe;

    public function __construct(public array $monederos=[]) {}

    public function compararPorFecha($a, $b) {
        $fechaA = DateTime::createFromFormat('d/m/Y', $a->getFecha());
        $fechaB = DateTime::createFromFormat('d/m/Y', $b->getFecha());

        if ($fechaA === false || $fechaB === false) {
            return 0;
        }

        return $fechaA <=> $fechaB;
    }
    public function compararPorConcepto($a, $b) {
        return strcmp(strtolower($a->getConcepto()), strtolower($b->getConcepto()));
    }
    public function compararNumerosFloat($a, $b) {
        return $a->getImporte() - $b->getImporte();
    }
    public function getMonederos($concepto=null) {
        if (!isset($concepto)){
            return $this->monederos;
        }
        if ($concepto=='ordenar_concepto'){
            usort($this->monederos,[$this,'compararPorConcepto']);
            return $this->monederos;
        }elseif ($concepto == 'ordenar_fecha') {
            usort($this->monederos, [$this, 'compararPorFecha']);
            return $this->monederos;
        } elseif ($concepto == 'ordenar_importe') {
            usort($this->monederos, [$this, 'compararNumerosFloat']);
            return $this->monederos;
        }

        $monederosFiltrados=[];
        foreach ($this->monederos as $monedero){
            if (str_contains(strtolower($monedero->getConcepto()),strtolower($concepto))){
                $monederosFiltrados[]=$monedero;
            }
        }
        return $monederosFiltrados;
    }

    public static function inicializar(){
        return new Monedero(self::cargarMonederosDesdeArchivo('Modelss/Monedero.txt'));
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