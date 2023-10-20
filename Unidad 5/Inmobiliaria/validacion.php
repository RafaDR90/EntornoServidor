<?php
//Compruebo si se han enviado datos por POST.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errores=[];
    //Valido tipo de vivienda.
    if(isset($_POST["tipoVivienda"])){
        $valoresValidosTipo = ["piso", "adosado", "chalet", "casa"];
        $tipoVivienda = $_POST["tipoVivienda"];
        if($tipoVivienda=="void"){
            $errores["tipoVivienda"]="Seleccione un tipo de vivienda";
        }else if(!validarTipoSelect($tipoVivienda,$valoresValidosTipo)){
            $errores["tipoVivienda"]="El tipo de vivienda no es valido.";
        }
    }else{
        $errores["tipoVivienda"]="Introduzca un tipo de vivienda";
    }
    //valido zona.
    if (isset($_POST["zona"])) {
        $valoresValidosZona = ["centro", "zaidin", "chana", "albaicin", "sacromonte", "realejo"];
        $zona = $_POST["zona"];
        if ($zona=="void") {
            $errores["zona"] = "Seleccione una zona";
        }else if (!validarTipoSelect($zona, $valoresValidosZona)) {
            $errores["zona"] = "La zona no es válida.";
        }
    }else{
        $errores["zona"]="Introduzca una zona";
    }
    //Saneo y valido direccion.
    if (isset($_POST["direccion"])){
        $direccion=$_POST["direccion"];
        $direccion=sanidarStringFiltro($direccion);
        if (!validar_requerido($direccion)){
            $errores["direccion"]="El campo no puede estar vacio.";
        }else if (strlen($direccion)>100){
            $errores["direccion"]="El campo direccion no puede contener mas de 100 caracteres.";
        }
    }else{
        $errores["direccion"]="Introduzca una direccion.";
    }
    //Valido numero de dormitorios.
    if (isset($_POST["numeroDormitorios"])){
        $numeroDormitorios=$_POST["numeroDormitorios"];
        $valoresValidosDormitorios=["1","2","3","4","5"];
        if (!validarTipoSelect($numeroDormitorios,$valoresValidosDormitorios)){
            $errores["numeroDormitorios"]="Numero de dormitoios no valido.";
        }
    }else{
        $errores["numeroDormitorios"]="Seleccione el numero de dormitorios";
    }
    //saneo y valido precio.
    if (isset($_POST["precio"])){
        $precio=$_POST["precio"];
        $precio=sanidarStringFiltro($precio);
        if (!preg_match("/^[0-9]{5,9}$/", $precio)){
            $errores["precio"]="Precio debe ser de 5 a 9 digitos y ningun caracter no numerico";
        }
    }else{
        $errores["precio"]="Introduzca precio.";
    }
    //Saneo y valido metros cuadrados.
    if (isset($_POST["metrosCuadrados"])){
        $metrosCuadrados=$_POST["metrosCuadrados"];
        $metrosCuadrados=sanidarStringFiltro($metrosCuadrados);
        if (!preg_match("/^[0-9]{2,5}$/", $metrosCuadrados)){
            $errores["metrosCuadrados"]="Metros cuadrados puede tener de 2 a 5 digitos y ningun caracter no numerico";
        }
    }else{
        $errores["metrosCuadrados"]="Introduzca metros cuadrados.";
    }

    //Valida extras (No crea error si no se ha introducido nada).
    if (isset($_POST["extras"])){
        $extrasValidos = ["piscina", "jardin", "garage"];
        $extras=$_POST["extras"];
        if (!validarTipoCheckBox($extras,$extrasValidos)){
            $errores["extras"]="Extra no valido.";
        }
    }else{
        $extras=[" "];
    }

    $archivo = $_FILES["foto"];

    $validacionImagen = validarImagen($archivo);
    if (isset($validacionImagen)) {
        $errores["foto"] = $validacionImagen;
    }

    if (isset($_POST["observaciones"])){
        $observaciones=$_POST["observaciones"];
        $observaciones=sanidarStringFiltro($observaciones);
        if (!validarSonLetrasONumeros($observaciones)){
            $errores["observaciones"]="El texto introducido debe contener como maximo 500 caracteres los cuales pueden ser numeros,letras,puntos,comas,interrogantes y exclamaciones";
        }
    }else{
        $observaciones=" ";
    }

    $carpetaDestino = "Img/";

    if (count($errores)==0){
        //comprueba si existe la carpeta para imagenes, si no existe la crea.
        if (!file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true); // Crea la carpeta si no existe
        }
        //mueve la foto a la carpeta img con el nombre de la foto y la fecha.
        $nombreFoto = date("YmdHi")."-".$archivo["name"];
        move_uploaded_file($archivo["tmp_name"],"$carpetaDestino$nombreFoto");
        //comprueba si existe datos.txt y si no esta, lo crea.
        if (!file_exists("datos.txt")){
            touch("datos.txt");
        }
        //abre el archivo datos.txt y escribe los datos.
        $datos=fopen("datos.txt","a");
        if($datos){
            $stringExtras = join(" ", $extras);
            $texto = "$tipoVivienda;$zona;$direccion;$numeroDormitorios;$precio;$metrosCuadrados;$stringExtras;$observaciones;$nombreFoto\n";
            fwrite($datos, $texto.'%');

        }
        fclose($datos);
        header('Location: ViviendaSubida.php');
        exit;
    }
}

function validarImagen(array $archivo): string|null
{
    if (!file_exists($archivo["tmp_name"])) {
        return "Seleccione una foto.";
    }

    if ($archivo["error"] !== 0) {
        return "Error al subir el archivo.";
    }

    $tiposPermitidos = ["image/jpeg", "image/png", "image/gif"];
    if (!in_array($archivo["type"], $tiposPermitidos)) {
        return "Tipo de archivo no valido. Solo se permiten imagenes (JPEG, PNG, GIF).";
    }

    $tamanoMaximo = 100 * 1024;
    if ($archivo["size"] > $tamanoMaximo) {
        return "El tamaño del archivo es mayor de 100 KB.";
    }

    return null;
}

/**
 * Valida si un valor seleccionado en un campo <checkbox> es valido.
 * @param $arrayValor array con valores a comprobar
 * @param $arrayValoresValidos array con valores permitidos
 * @return bool
 */
function validarTipoCheckBox(array $arrayValor, array $arrayValoresValidos):bool{
    foreach ($arrayValor as $valor){
        if(in_array($valor,$arrayValoresValidos)){
           continue;
        }
        return false;
    }

    return true;
}

/**
 * Valida si un valor seleccionado en un campo <select> es válido.
 * @param $valor valor a comprobar
 * @param $arrayValoresValidos array con valores permitidos
 * @return bool
 */
function validarTipoSelect($valor, array $arrayValoresValidos):bool{
    if (in_array($valor, $arrayValoresValidos)){
        return true;
    }
    return false;
}

    /**
 * Sanea retirando etiquetas,limpiando string por ambas partes, corrige entidades html como por ejemplo
 * quot y las convierte a sus respectivos caracteres
 * @param $valor string a sanear
 * @return string
 */
function sanidarStringFiltro(string $valor):string{

    //Retira etiquetas html y php
    $valor=strip_tags($valor);

    //limpia el string por delante y x detras
    $valor=htmlspecialchars($valor,ENT_QUOTES);

    //corige entidades html y las cambia
    $valor=str_replace(["quot;","&#039;"],["&#34;","&#39;"],$valor);

    //convierte las entidades como "quot;" en sus respectivos caracteres
    return html_entity_decode($valor);
}

/**
 * si $texto esta vacio dara false, si esta vacio retornara false
 * @param $texto string a comprobar
 * @return bool
 */
function validar_requerido(string $texto):bool{
    return !(trim($texto)=='');
}

/**
 * Comprueba que solo contiene letras minusculas/mayusculas, ascetnos y espacios
 * @param $texto string a comprobar
 * @return bool
 */
function son_letras(string $texto):bool{
    $patron="/^[a-zA-Záéíóú\s]+$/";
    return preg_match($patron,$texto);
}

/**
 * Sanea y valida email, retorna true si esta correcto.
 * @param $correo string a validar
 * @return bool
 */
function emailValido(string $correo):bool {
    //Filtra el correo electrónico para eliminar caracteres no deseados
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

    //Comprueba si el correo electrónico es valido
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true; //correo electrónico valido
    }
    return false; //correo electrónico no valido
}

/**
 * Verifica si un número de teléfono es válido.
 * @param $numero string a validar
 * @return bool
 */
function telefonoValido(string $numero):bool {
    //Elimina espacios en blanco, guiones y paréntesis
    $numero = preg_replace("/\s|-|\(|\)/", "", $numero);

    //Comprueba si el número tiene el formato adecuado
    if (preg_match("/^[0-9]{9}$/", $numero)) {
        return true; //numero de teléfono valido
    }
    return false; //numero de teléfono no valido

}

/**
 * Valida una cadena de texto, devuelve true si esta vacia, si tiene menos de 500 caracteres
 * y si no contiene caracteres que no sean letras,numeros,puntos,comas,interrogantes,excplamaciones
 * o saltos de linea.
 * @param $cadena string a validar
 * @return bool
 */
function validarSonLetrasONumeros($cadena):bool {
    // Verificar si la cadena está vacía
    if (empty($cadena)) {
        return true;
    }
    if (strlen($cadena) > 500) {
        return false;
    }

    if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ0-9.,?!\\- ]+$/u", $cadena)) {
        return true;
    } else {
        return false;
    }
}

