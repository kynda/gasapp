<?php
    $currencyFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    $mpgFormatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
    $mpgFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 1);
    $mpgFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 1);

    $galFormatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
    $galFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 1);
    $galFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 3);

    $milesFormatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
?>

<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Gallons</th>
            <th scope="col">Total</th>
            <th scope="col">Trip</th>
            <th scope="col">Odometer</th>
            <th scope="col">MPG</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($entries as $entry): ?>
        <tr>
            <th scope="row"><?= $entry['id'] ?></th>
            <td><?= $entry['date'] ?></td>
            <td><?= $galFormatter->format($entry['gallons']) ?></td>
            <td><?= $currencyFormatter->formatCurrency($entry['total'], 'USD') ?></td>
            <td><?= $milesFormatter->format($entry['trip']) ?></td>
            <td><?= $milesFormatter->format($entry['odometer']) ?></td>
            <td><?= $mpgFormatter->format($entry['mpg']) ?></td>
            <td>
                <button
                    class="btn btn-outline-secondary"
                    type="button"
                    hx-get="/edit?entry=<?= $entry['id'] ?>"
                    hx-target="#entryForm"
                ><i class="bi bi-pencil"></i></button>
                <button
                    class="btn btn-outline-secondary"
                    type="button"
                    hx-delete="/entry?id=<?= $entry['id'] ?>"
                    hx-target="#entries"
                ><i class="bi bi-trash"></i></button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
