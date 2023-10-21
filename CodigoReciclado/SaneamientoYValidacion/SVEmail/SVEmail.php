<?php
/**
 * Funcion que sanea y valida un email, en caso de error retorna un string con el error y null,
 * en caso de estar correcto retorna el email saneado.
 * @param $nameEmail
 * @param $errores
 * @return string|null
 */
function SVEmail($nameEmail, &$errores):?string{
    if (isset($_POST[$nameEmail])){
        $email=$_POST[$nameEmail];
        $emailSaneado=filter_var($email,FILTER_SANITIZE_EMAIL);
        if (filter_var($emailSaneado,FILTER_VALIDATE_EMAIL)){
            return $emailSaneado;
        }
        $errores[$nameEmail]="El email no es valido";
        return null;
    }
    $errores[$nameEmail]="El campo email es obligatorio";
    return null;
}
