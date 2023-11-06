<main>
    <table>
        <thead>
        <tr>
            <th>Concepto</th>
            <th>Fecha</th>
            <th>Importe</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($monederos as $monedero): ?>
            <tr>
                <td><?php echo $monedero->getConcepto(); ?></td>
                <td><?php echo $monedero->getFecha()->format('Y-m-d'); ?></td>
                <td><?php echo $monedero->getImporte(); ?> €</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>