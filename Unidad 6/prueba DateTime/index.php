<?php
$dateTimeVariable = DateTime::createFromFormat('d/m/Y', '10/14/1990');

/**
 * Verifica la validez y futuridad de una fecha introducida.
 * @param string $fechaElegida La fecha introducida en formato 'd/m/Y'.
 * @return string El mensaje indicando si la fecha es válida y no es futura, o el motivo por el cual no es válida.
 */
function verificarFecha($fechaElegida,&$errores) {
    $dateTimeVariable = DateTime::createFromFormat('d/m/Y', $fechaElegida);

    if ($dateTimeVariable === false || $dateTimeVariable->format('d/m/Y') !== $fechaElegida) {
        return "La fecha introducida no es válida.";
    } else {
        $fechaActual = new DateTime();

        if ($dateTimeVariable > $fechaActual) {
            $errores "La fecha no puede ser futura.";
        } else {
            return "La fecha es válida y no es futura.";
        }
    }
}