<?php
namespace Controllers;

use Modelss\Monedero,
    Libreria\Pages;

class MonederoController {
    private Monedero $monedero;
    private Pages $pages;

    public function __construct() {
        $this->monedero=Monedero::inicializar();
        $this->pages = new Pages();
    }

    public function listarMonederos() {

        $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos()]);
    }

    public function agregarMonedero($concepto, $fecha, $importe) {


        $archivo = 'Models/Monederos.txt';
        $linea = "$concepto,$fecha,$importe";
        file_put_contents($archivo, $linea . PHP_EOL, FILE_APPEND | LOCK_EX);
                                              //nueva linea | Sin sobreescribir | Bloquea el fichero mientras estoy usandolo
    }

    public function borrarMonedero($concepto){
        $archivo="Modelss/Monederos.txt";
        if (file_exists($archivo)){
            $lineas=file($archivo);
            foreach ($lineas as $indice => $linea){
                $datos=explode(',',$linea);
                $conceptoLinea=trim($datos[0]);
                if ($concepto==$conceptoLinea){
                    $lineas[$indice]=$_POST['concepto_edit'] . ',' . $_POST['fecha_edit'] . ',' . $_POST['cantidad_edit'] . PHP_EOL;
                }
            }
            $nuevoContenido=implode('',$lineas);
            file_put_contents($archivo,$nuevoContenido);
        }
        unset($_POST);
        header("Location: index.php");
    }
}
