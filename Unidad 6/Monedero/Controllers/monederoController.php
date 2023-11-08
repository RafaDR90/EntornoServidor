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

    public function borrarMonedero2(){
        $archivo="Modelss/Monederos.txt";
        if (file_exists($archivo)){
            $lineas=file($archivo);
            foreach ($lineas as $indice => $linea){
                $datos=explode(',',$linea);
                $conceptoLinea=trim($datos[0]);
                if ($_POST['concepto_edit']==$conceptoLinea){
                    $lineas[$indice]=$_POST['concepto_edit'] . ',' . $_POST['fecha_edit'] . ',' . $_POST['cantidad_edit'] . PHP_EOL;
                }
            }
            $nuevoContenido=implode('',$lineas);
            file_put_contents($archivo,$nuevoContenido);
        }
        unset($_POST);
        header("Location: index.php");
    }
    public function borrarMonedero(){
        $archivo = "Modelss/Monederos.txt";
        if (file_exists($archivo)){

            $lineas = file($archivo);
            $nuevoContenido = '';
            chmod($archivo, 0666);

            $archivoAbierto = fopen($archivo, 'w');
            if ($archivoAbierto) {
                foreach ($lineas as $indice => $linea){
                    $datos = explode(',', $linea);
                    $conceptoLinea = trim($datos[0]);
                    var_dump($_POST['concepto_edit']); var_dump("<br>".$conceptoLinea);die();
                    if ($_POST['concepto_edit'] == $conceptoLinea){
                        $lineaModificada = $_POST['concepto_edit'] . ',' . $_POST['fecha_edit'] . ',' . $_POST['cantidad_edit'] . PHP_EOL;
                        fwrite($archivoAbierto, $lineaModificada);
                    } else {
                        fwrite($archivoAbierto, $linea);
                    }
                }
                fclose($archivoAbierto);
            }
        }
        unset($_POST);
        header("Location: index.php");
    }
}
