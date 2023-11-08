<?php
namespace Controllers;

use Modelss\Monedero,
    Libreria\Pages,
    Validacion\validacion;

class MonederoController {
    public $errores=[];
    private Monedero $monedero;
    private Pages $pages;
    public function __construct() {
        $this->monedero=Monedero::inicializar();
        $this->pages = new Pages();
    }

    public function listarMonederos() {

        $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos()]);
    }


    public function editarMonedero(){
        $concepto=$_POST['concepto_edit'];
        if (isset($this->errores[$concepto])){
            unset($this->errores[$concepto]);
        }
        $validador=new validacion();
        $fecha=$_POST['fecha_edit'];
        $cantidad=$_POST['cantidad_edit'];
        $concepto=$validador->saneaYValidaNombresPOST('concepto_edit',$concepto,$this->errores,$concepto);
        if (count($this->errores)!=0){
            header("Location: index.php");
            exit();
        }
        $archivo="Modelss/Monedero.txt";
        if (file_exists($archivo)){
            $lineas=file($archivo);
            foreach ($lineas as $indice => $linea){
                $datos=explode(',',$linea);
                $conceptoLinea=trim($datos[0]);
                if ($_GET['conceptoEdit']==$conceptoLinea){
                    $lineas[$indice]=$concepto . ',' . $fecha . ',' . $cantidad . PHP_EOL;
                }
            }
            $nuevoContenido=implode('',$lineas);
            file_put_contents($archivo,$nuevoContenido);
        }
        unset($_POST);
        header("Location: index.php");
    }

    public function borrarMonedero(){
        $archivo="Modelss/Monedero.txt";
        if (file_exists($archivo)){
            $lineas=file($archivo);
            foreach ($lineas as $indice => $linea){
                $datos=explode(',',$linea);
                $conceptoLinea=trim($datos[0]);
                if ($_GET['conceptoBorrar']==$conceptoLinea){
                    unset($lineas[$indice]);
                }
            }
            $nuevoContenido=implode('',$lineas);
            file_put_contents($archivo,$nuevoContenido);
        }
        unset($_POST);
        header("Location: index.php");
    }

    public function agregarCampo(){
        $archivo="Modelss/Monedero.txt";
        if (file_exists($archivo)){
            file_put_contents($archivo, $_POST['concepto'].",".$_POST['fecha'].",".$_POST['importe'] . PHP_EOL. file_get_contents($archivo));
        }
        unset($_POST);
        header("Location: index.php");
    }
}
