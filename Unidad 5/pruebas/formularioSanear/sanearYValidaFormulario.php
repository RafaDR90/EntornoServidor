<?php
$nombre=$_POST["nombre"] ?? null;
$edad=$_POST["edad"] ?? null;
$web=$_POST["web"] ?? null;
$correo=$_POST["correo"] ?? null;

function sanidarStringFiltro($valor){

    //Retira etiquetas html y php
    $valor=strip_tags($valor);

    //limpia el string por delante y x detras
    $valor=htmlspecialchars($valor,ENT_QUOTES);

    //corige entidades html y las cambia
    $valor=str_replace(["quot;","&#039;"],["&#34;","&#39;"],$valor);

    //convierte las entidades como "quot;" en sus respectivos caracteres
    return html_entity_decode($valor);
}
if ($_SERVER["REQUEST_METHOD"]=="POST"):?>
<!--estos son los datos saneados-->

<!--ahora a validar-->
<?php
    /**
     * si $texto esta vacio dara false, si esta leno dara true
     * @param $texto
     * @return bool
     */
    function validar_requerido($texto):bool{
        return !(trim($texto)=='');
    }

    /**
     * Comprueba que solo contiene letras minusculas/mayusculas, ascetnos y espacios
     * @param $texto
     * @return bool
     */
    function son_letras($texto):bool{
        $patron="/^[a-zA-Záéíóú\s]+$/";
        return preg_match($patron,$texto);
    }

    $errores=[];

    if (!validar_requerido($nombre)){
        $errores["nombre"]="El nombre es obligatorio";
    }

    if(!son_letras($nombre)){
        $errores["nombre"]="El nombre solo puede estar compuesto por letras y espacios";
    }

    if (!filter_var($edad,FILTER_VALIDATE_INT)){
        $errores["edad"]="La edad debe estar compuesta por numeros enteros";
    }

    if(!filter_var($web,FILTER_VALIDATE_URL)){
        $errores["web"]="El campo web no es correcto";
    }

    ?>



<?php endif; ?>
