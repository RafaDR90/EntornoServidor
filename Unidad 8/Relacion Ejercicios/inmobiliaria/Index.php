<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include "validacion.php"; ?>
<form method="post" enctype="multipart/form-data" action=<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>>
    <p>
        <label class="lbl" for="tipoVivienda">Tipo de vivienda:</label>
        <select name="tipoVivienda" id="tipoVivienda">
            <option value=void selected>Seleccione tipo de vivienda</option>
            <option value="piso">Piso</option>
            <option value="adosado">Adosado</option>
            <option value="chalet">Chalet</option>
            <option value="casa">Casa</option>
        </select>
        <?php if(isset($errores["tipoVivienda"])) echo "<span class='err'>".$errores["tipoVivienda"]."</span>" ?>
    </p>
    <p><label class="lbl" for="zona">Zona:</label>
        <select name="zona" id="zona">
            <option value=void selected>Seleccione zona</option>
            <option value="centro">Centro</option>
            <option value="zaidin">Zaidin</option>
            <option value="chana">Chana</option>
            <option value="albaicin">Albaicín</option>
            <option value="sacromonte">Sacromonte</option>
            <option value="realejo">Realejo</option>
        </select>
        <?php if(isset($errores["zona"])) echo "<span class='err'>".$errores["zona"]."</span>" ?>
    </p>
    <p>
        <label class="lbl" for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion">
        <?php if(isset($errores["direccion"])) echo "<span class='err'>".$errores["direccion"]."</span>" ?>
    </p>
    <p>
        <label class="lbl">Número de dormitorios:</label>
        <input type="radio" id="dormitorio1" name="numeroDormitorios" value="1">
        <label for="dormitorio1">1</label>
        <input type="radio" id="dormitorio2" name="numeroDormitorios" value="2">
        <label for="dormitorio2">2</label>
        <input type="radio" id="dormitorio3" name="numeroDormitorios" value="3">
        <label for="dormitorio3">3</label>
        <input type="radio" id="dormitorio4" name="numeroDormitorios" value="4">
        <label for="dormitorio4">4</label>
        <input type="radio" id="dormitorio5" name="numeroDormitorios" value="5">
        <label for="dormitorio5">5</label>
        <?php if(isset($errores["numeroDormitorios"])) echo "<span class='err'>".$errores["numeroDormitorios"]."</span>" ?>
    </p>
    <p>
        <label class="lbl" for="precio">Precio:</label>
        <input type="number" id="precio" name="precio">
        <span>€ </span>
        <?php if(isset($errores["precio"])) echo "<span class='err'>".$errores["precio"]."</span>" ?>
    </p>
    <p>
        <label class="lbl" for="metrosCuadrados">Tamaño:</label>
        <input type="number" id="metrosCuadrados" name="metrosCuadrados">
        <span>metros cuadrados </span>
        <?php if(isset($errores["metrosCuadrados"])) echo "<span class='err'> ".$errores["metrosCuadrados"]."</span>" ?>
    </p>
    <p>
        <label class="lbl">Extras:</label><br>
        <input type="checkbox" id="piscina" name="extras[]" value="piscina">
        <label for="piscina">Piscina</label>

        <input type="checkbox" id="jardin" name="extras[]" value="jardin">
        <label for="jardin">Jardin</label>

        <input type="checkbox" id="garage" name="extras[]" value="garage">
        <label for="garage">Garage</label>
        <?php if(isset($errores["extras"])) echo "<span class='err'>".$errores["extras"]."</span>" ?>
    </p>
    <p>
        <label class="lbl" for="foto">Foto: (máximo 100 MB):</label>
        <input type="file" id="foto" name="foto" accept="image/jpeg, image/png, image/gif">
        <?php if(isset($errores["foto"])) echo "<span class='err'>".$errores["foto"]."</span>" ?>
    </p>
    <p>
        <label class="lbl" for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea>
        <?php if(isset($errores["observaciones"])) echo "<span class='err'>".$errores["observaciones"]."</span>" ?>
    </p>
    <p>
        <input type="submit" value="Insertar vivienda">
    </p>
</form>
</body>
</html>