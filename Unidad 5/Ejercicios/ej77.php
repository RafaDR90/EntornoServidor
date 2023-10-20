<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    include "ej7.php";
    global $alumnos;
    foreach ($alumnos as $name => $nt) {
        if (is_array($nt)) {
            // Si $nt es un array, lo procesas para imprimirlo como una cadena
            $nota = join(", ", $nt); // Convierte el array en una cadena separada por comas
            echo "<p>$name : $nota</p>";
        } else {
            // Si $nt no es un array, imprímelo directamente
            echo "<p>$name : $nt</p>";
        }
    }
    ?>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">

        <label for="nota">Nota</label>
        <input type="number" id="nota" name="nota">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>