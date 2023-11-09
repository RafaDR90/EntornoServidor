<?php
namespace Validacion;
class validacion{

    function sanearValidarImporte(string $importe, array &$errores, string $nombreError)   {
        $importe = str_replace(',', '.', $importe);

        if ($importe=="") {
            $errores[$nombreError] = "El importe no puede estar vacío.";
            return;
        }else if (!preg_match('/^\-?\d+(\.\d{1,2})?$/', $importe)) {
            $errores[$nombreError] = "El importe no es válido.";
            return;
        }
        return $importe;
    }

    /**
     * Verifica la validez y futuridad de una fecha introducida.
     * @param string $fechaElegida La fecha introducida en formato 'd/m/Y'.
     * @return string El mensaje indicando si la fecha es válida y no es futura, o el motivo por el cual no es válida.
     */
    function verificarFecha(string $fechaElegida,array &$errores,string $nombreError){
        $fechaElegida = str_replace(['.',' ', ',', '-'], '/', $fechaElegida);
        $dateTimeVariable = \DateTime::createFromFormat('d/m/Y', $fechaElegida);

        if ($dateTimeVariable === false || $dateTimeVariable->format('d/m/Y') !== $fechaElegida) {
            $errores[$nombreError]="La fecha introducida no es válida.";
        } else {
            $fechaActual = new \DateTime();

            if ($dateTimeVariable > $fechaActual) {
                $errores[$nombreError]="La fecha no puede ser futura.";
            }
            return $fechaElegida;
        }
    }


    /**
     * Funcion que sanea y valida un nombre, en caso de error retorna un string con el error.
     * @param $nombreAValidar string con el nombre a validar
     * @param $nombreValidado string que retorna validado la funcion
     * @param $errores array de errores
     * @param $nombreError
     * @return string|null
     */
    function saneaYValidaNombresPOST( $nombreAValidar, $nombreValidado, array &$errores, $nombreError):string|null{
        if(isset($_POST[$nombreAValidar])){
            $nombreValidado=$_POST[$nombreAValidar];

            $nombreValidado=$this->sanidarStringFiltro($nombreValidado);

            if (!$this->noEstaVacio($nombreValidado)) {
                $errores[$nombreError] = "El campo no puede estar vacio";
                return null;
            }
            if(!$this->son_letras($nombreValidado)){
                $errores[$nombreError]="El campo solo puede estar compuesto por letras y espacios";
                return null;
            }
            return $nombreValidado;
        }
        $errores[$nombreError]="El campo no puede estar vacio";
        return null;
    }



    /**
     * Funcion que sanea un string, retirando etiquetas,limpiando string por ambas partes,
     * corrige entidades html como por ejemplo quot y las convierte a sus respectivos
     * caracteres
     * @param $valor string a sanear
     * @return string string saneado
     */
    function sanidarStringFiltro($valor):string{
        $valor=trim($valor);

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
     * si $texto esta vacio retornara false, de lo contrario retornara true
     * @param $texto string a comprobar
     * @return bool true si no esta vacio, false si esta vacio
     */
    function noEstaVacio($texto):bool{
        return !(trim($texto)=='');
    }

    /**
     * Comprueba que solo contiene letras minusculas/mayusculas, ascetnos y espacios
     * (\s acepta espacios)
     * @param $texto string a comprobar
     * @return bool true si solo contiene letras, false si no
     */
    function son_letras($texto):bool{
        $patron="/^[a-zA-Záéíóú\s]+$/";
        return preg_match($patron,$texto);
    }


    /**
     * Sanitiza una fecha dada, eliminando espacios, convirtiendo , o ; o - a /,
     * añadiendo ceros a día y mes si son de un solo dígito, y ajustando el año.
     *
     * También valida el formato de fecha (día/mes/año), el rango de fechas y
     * asegura que la fecha no sea mayor que la fecha actual.
     *
     * @param string $fecha La fecha original a sanitizar.
     * @return string Mensaje indicando el resultado de la sanitización o error.
     */




}

