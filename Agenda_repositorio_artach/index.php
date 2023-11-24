
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

    <?php
        require_once 'outoload.php';
        require_once 'config/config.php';

        use Controllers\FrontController;
        FrontController::main();
    ?>

</body>
</html>
