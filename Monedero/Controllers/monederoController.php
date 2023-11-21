<?php
namespace Controllers;

use Models\Monedero,
    Libreria\Pages,
    Validacion\validacion;

class MonederoController {
    private array $errores=[];
    private Monedero $monedero;
    private Pages $pages;

    /**
     * Lanza la funcion de la clase monedero para crear un array de monederos.
     * Crea un objeto de tipo Pages para renderizar las paginas.
     */
    public function __construct() {
        $this->monedero=Monedero::inicializar();
        $this->pages = new Pages();
    }

    /**
     * Funcion que muestra la pagina principal del monedero
     *
     * @return void
     */
    public function listarMonederos():void{
        $concepto=null;
        if (isset($_GET['search'])){
            $concepto=$_GET['search'];
        }
        if (isset($_GET['ordenar'])){
            $concepto=$_GET['ordenar'];
        }
        $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos($concepto)]);
    }


    /**
     * Funcion que edita monedero del fichero si los datos son correctos
     * @return void
     */
    public function editarMonedero():void{
        $concepto=$_POST['concepto_edit'];
        if (isset($this->errores['error'])){
            unset($this->errores['error']);
        }
        $validador=new validacion();
        $concepto=$validador->saneaYValidaNombresPOST('concepto_edit',$concepto,$this->errores,$_POST['concepto_edit']);
        $fecha=$validador->verificarFecha($_POST['fecha_edit'],$this->errores,$_POST['concepto_edit']);
        $cantidad=$validador->sanearValidarImporte($_POST['cantidad_edit'],$this->errores,$_POST['concepto_edit']);
        if (count($this->errores)!=0){
            unset($_POST);
            $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos(),'errores'=>$this->errores]);
            exit();
        }
        $archivo="Models/Monedero.txt";
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

    /**
     * Funcion que borra un monedero del fichero si se le pasa el concepto por get
     * @return void
     */
    public function borrarMonedero():void {
        $archivo="Models/Monedero.txt";
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

    /**
     * Funcion que agrega un campo al fichero si los datos son correctos
     * @return void
     */
    public function agregarCampo():void {
        $concepto=$_POST['concepto'];
        if (isset($this->errores['error'])){
            unset($this->errores['error']);
        }
        $validador=new validacion();
        $concepto=$validador->saneaYValidaNombresPOST('concepto',$concepto,$this->errores,$_POST['concepto']);
        $fecha=$validador->verificarFecha($_POST['fecha'],$this->errores,$_POST['concepto']);
        $cantidad=$validador->sanearValidarImporte($_POST['importe'],$this->errores,$_POST['concepto']);
        if (count($this->errores)!=0){
            $this->pages->render('Monedero/muestraMonederos',['monederos' => $this->monedero->getMonederos(),'errores'=>$this->errores]);
            unset($_POST);
            exit();
        }

        $archivo="Models/Monedero.txt";
        if (file_exists($archivo)){
            file_put_contents($archivo, $concepto.",".$fecha.",".$cantidad . PHP_EOL. file_get_contents($archivo));
        }else{
            touch($archivo);
            chmod($archivo,0666);
            file_put_contents($archivo, $concepto.",".$fecha.",".$cantidad . PHP_EOL. file_get_contents($archivo));
        }
        unset($_POST);
        header("Location: index.php");
    }


}
