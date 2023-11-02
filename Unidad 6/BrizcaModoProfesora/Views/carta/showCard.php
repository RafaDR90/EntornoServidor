<?php
if (isset($_POST["suit"]) && isset($_POST["cardNumber"])):
    if (\Models\carta::comprobarPalo($_POST["suit"]) && \Models\carta::comprobarNumero($_POST["cardNumber"])):
        $card="./Img/".$_POST["suit"]."_".$_POST["cardNumber"].".jpg";

        ?>
        <img src="<?php echo $card ?>">
    <?php endif;
endif;?>