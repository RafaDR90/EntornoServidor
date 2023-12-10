<?php
/**
 * Funcion que comprueba que una contraseña solo tiene determinados caracteres
 * @param $password
 * @return bool true si la contraseña es valida, false si no
 */
function validarContrasena($password): bool {
    // Verifica si la contraseña contiene al menos una letra mayúscula
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    // Verifica si la contraseña contiene al menos una letra minúscula
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    // Verifica si la contraseña contiene al menos un número
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    // Verifica si la contraseña contiene al menos uno de los siguientes caracteres especiales: _ / .
    if (!preg_match('/[_\/.]/', $password)) {
        return false;
    }
    // Si la contraseña pasa todas las validaciones, retorna true
    return true;
}
