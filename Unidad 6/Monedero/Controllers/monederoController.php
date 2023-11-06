<?php
namespace Controllers;

use Modelss\Monedero,
    Libreria\Pages;

class MonederoController {
    private Monedero $monedero;
    private Pages $pages;

    public function __construct() {
        $this->monedero = new Monedero();
        $this->pages = new Pages();
    }

    public function listarMonederos(Monedero $monedero = null) {
        if ($monedero == null) {
            $monedero = $this->monedero;
        }
        $this->pages->render('Monedero/muestraMonederos', ['monederos' => $monedero->getMonederos()]);
    }

    public function agregarMonedero($concepto, $fecha, $importe) {
        $nuevoMonedero = new Monedero($concepto, $fecha, $importe);

        $archivo = 'Models/Monederos.txt';
        $linea = "$concepto,$fecha,$importe";
        file_put_contents($archivo, $linea . PHP_EOL, FILE_APPEND | LOCK_EX);
                                              //nueva linea | Sin sobreescribir | Bloquea el fichero mientras estoy usandolo
        $this->listarMonederos($nuevoMonedero);
    }
}
