<?php
namespace Controllers;

use Modelss\Monedero,
    Libreria\Pages,
    Validacion\validacion;

class MonederoController {
    private array $errores=[];
    private Monedero $monedero;
    private Pages $pages;
    public function __construct() {
        $this->monedero=Monedero::inicializar();
        $this->pages = new Pages();
    }

    public function listarMonederos() {
        $concepto=null;
        if (isset($_GET['search'])){
            $concepto=$_GET['search'];
        }
        if (isset($_GET['ordenar'])){
            $concepto=$_GET['ordenar'];
        }
        $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos($concepto)]);
    }


    public function editarMonedero(){
        $concepto=$_POST['concepto_edit'];
        if (isset($this->errores['error'])){
            unset($this->errores['error']);
        }
        $validador=new validacion();
        $fecha=$_POST['fecha_edit'];
        $cantidad=$_POST['cantidad_edit'];
        $concepto=$validador->saneaYValidaNombresPOST('concepto_edit',$concepto,$this->errores,$_POST['concepto_edit']);
        $fecha=$validador->verificarFecha($_POST['fecha_edit'],$this->errores,$_POST['concepto_edit']);
        $cantidad=$validador->sanearValidarImporte($_POST['cantidad_edit'],$this->errores,$_POST['concepto_edit']);
        if (count($this->errores)!=0){
            unset($_POST);
            $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos(),'errores'=>$this->errores]);
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
        $concepto=$_POST['concepto'];
        if (isset($this->errores['error'])){
            unset($this->errores['error']);
        }
        $validador=new validacion();
        $fecha=$_POST['fecha'];
        $cantidad=$_POST['importe'];
        $concepto=$validador->saneaYValidaNombresPOST('concepto',$concepto,$this->errores,$_POST['concepto']);
        $fecha=$validador->verificarFecha($_POST['fecha'],$this->errores,$_POST['concepto']);
        $cantidad=$validador->sanearValidarImporte($_POST['importe'],$this->errores,$_POST['concepto']);
        if (count($this->errores)!=0){
            $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos(),'errores'=>$this->errores]);
            unset($_POST);
            exit();
        }

        $archivo="Modelss/Monedero.txt";
        if (file_exists($archivo)){
            file_put_contents($archivo, $_POST['concepto'].",".$_POST['fecha'].",".$_POST['importe'] . PHP_EOL. file_get_contents($archivo));
        }
        unset($_POST);
        header("Location: index.php");
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public function setErrores(array $errores): void
    {
        $this->errores = $errores;
    }


}
