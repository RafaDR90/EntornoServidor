<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/index.css">
</head>
<body>
<div id="contenedorBody">
<header>
    <img src="Img/fotoHeader.png">
</header>
    <main>
        <!-- Crea la tabla y en su primer <tr> manta por get una variable con la condicion de ordenacion -->
        <table>
            <tr id="tr_titulos">
                <th><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?ordenar=ordenar_concepto">Concepto</a></th>
                <th><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?ordenar=ordenar_fecha">Fecha</a></th>
                <th><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?ordenar=ordenar_importe">Importe</a></th>
            </tr>