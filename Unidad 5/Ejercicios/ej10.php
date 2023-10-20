<?php
include "FuncionesValidacionFormoularios.php";
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        if (isset($_POST["nombre"])&& isset($_POST["apellidos"]) && isset($_POST["email"])
            && isset($_POST["telefono"]) && isset($_POST["empleoActual"]) && isset($_POST["lenguaje"])){
            $errores=[];
            if (!sanidarStringFiltro($_POST["nombre"]) or !validar_requerido($_POST["nombre"]) or !son_letras($_POST["nombre"])){
                $errores["Nombre"]="Nombre invalido.";
            }

            if (!sanidarStringFiltro($_POST["apellidos"]) or !validar_requerido($_POST["apellidos"]) or !son_letras($_POST["apellidos"])){
                $errores["Apellidos"]="Apellidos invalidos.";
            }

            if(!emailValido($_POST["email"])){
                $errores["Email"]="Email invalido";
            }

            if(!telefonoValido($_POST["telefono"])){
                $errores["Telefono"]="Telefono no valido";
            }

            if (!sanearYValidarURL($_POST["url"])){
                $errores["URL"]="URL no valida";
            }

            if(empty($errores)){
                echo "Enhorabuena tu formulario se ha enviado satisfactoriamente";
            }else{
                foreach ($errores as $error){
                    echo "$error<br>";
                }
            }


        }else{
            echo "Hay 1 o mas campos sin rellenar";
            header("refresh:5;ej10.html");
        }
    }else{
        echo "No se han recibido datos";
        header("refresh:5;ej10.html");
    }