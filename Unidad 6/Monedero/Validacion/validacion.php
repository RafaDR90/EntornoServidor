<?php
namespace Validacion;
class validacion{
    /**
     * Funcion que sanea y valida un nombre, en caso de error retorna un string con el error.
     * @param $nombreAValidar string con el nombre a validar
     * @param $nombreValidado string que retorna validado la funcion
     * @param $errores array de errores
     * @param $nombreError
     * @return string|null
     */
    function saneaYValidaNombresPOST( $nombreAValidar, &$nombreValidado, array &$errores, $nombreError):string|null{
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
    function SVFechaString($fecha) {
        //limpia espacios
        $fecha = trim($fecha);
        // Eliminar espacios y convertir , o ; o - a /
        $fecha = str_replace([' ', ',', ';', '-'], '/', $fecha);

        // Dividir la fecha en partes (día, mes, año)
        $partes = explode('/', $fecha);

        // Añadir ceros a día y mes si son de un solo dígito
        $partes[0] = str_pad($partes[0], 2, '0', STR_PAD_LEFT);
        $partes[1] = str_pad($partes[1], 2, '0', STR_PAD_LEFT);

        // Añadir 20 al año si es de dos dígitos
        $partes[2] = strlen($partes[2]) == 2 ? '20' . $partes[2] : $partes[2];

        // Formar la fecha saneada
        $fechaSaneada = implode('/', $partes);

        // Validar el formato de fecha (día/mes/año)
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $fechaSaneada)) {
            // Validar el rango de fechas
            $dia = intval($partes[0]);
            $mes = intval($partes[1]);
            $year = intval($partes[2]);

            // Obtener la fecha actual
            $fechaActual = date('Y-m-d');
            $fechaInput = "$year-$mes-$dia";

            // Comparar las fechas
            if ($dia >= 1 && $dia <= 31 && $mes >= 1 && $mes <= 12 && $year >= 2000 && $year <= 2023 && strtotime($fechaInput) <= strtotime($fechaActual)) {
                return $fechaSaneada;
            } else {
                return "Fecha fuera de rango válido o mayor que la fecha actual";
            }
        } else {
            // Si el formato no es válido, puedes manejar el error según tus necesidades
            return "Formato de fecha no válido";
        }
    }



}

