<div>
    <form action=http://localhost/Entorno%20Servidor/Unidad%206/BrizcaModoProfesora/index.php?controller=carta&action=showCard method="post" >
        <p>
            <label for="suit">Palo</label>
            <select id="suit" name="suit">
                <option value="bastos" <?php if (isset($_GET['suit']) && $_GET['suit'] == 'bastos') echo 'selected'; ?>>Bastos</option>
                <option value="copas" <?php if (isset($_GET['suit']) && $_GET['suit'] == 'copas') echo 'selected'; ?>>Copas</option>
                <option value="espadas" <?php if (isset($_GET['suit']) && $_GET['suit'] == 'espadas') echo 'selected'; ?>>Espadas</option>
                <option value="oros" <?php if (isset($_GET['suit']) && $_GET['suit'] == 'oros') echo 'selected'; ?>>Oros</option>
            </select>
        </p>
        <p>
            <label for="cardNumber">Numero de carta</label>
            <select id="cardNumber" name="cardNumber" >
                <option value="1" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '1') echo 'selected'; ?>>AS</option>
                <option value="2" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '2') echo 'selected'; ?>>2</option>
                <option value="3" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '3') echo 'selected'; ?>>3</option>
                <option value="4" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '4') echo 'selected'; ?>>4</option>
                <option value="5" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '5') echo 'selected'; ?>>5</option>
                <option value="6" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '6') echo 'selected'; ?>>6</option>
                <option value="7" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '7') echo 'selected'; ?>>7</option>
                <option value="8" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '8') echo 'selected'; ?>>8</option>
                <option value="9" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '9') echo 'selected'; ?>>9</option>
                <option value="10" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '10') echo 'selected'; ?>>Sota</option>
                <option value="11" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '11') echo 'selected'; ?>>Caballo</option>
                <option value="12" <?php if (isset($_GET['cardNumber']) && $_GET['cardNumber'] == '12') echo 'selected'; ?>>Rey</option>
            </select>
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
</div>