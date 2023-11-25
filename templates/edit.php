<form id="entryForm">
    <div class="mb-3">
        <label for="vehicle" class="form-label">Vehicle</label>
        <select
                name="vehicle"
                class="form-select"
                aria-label="Vehicle selection"
                hx-get="/list"
                hx-target="#entries"
                required
        >
            <option value="-1" <?= $entry ? '' : 'selected' ?>>Select Vehicle</option>
            <?php foreach($vehicles as $key => $vehicle): ?>
                <option
                    value="<?= $key ?>"
                    <?= !empty($entry['vehicle']) && $entry['vehicle'] === $key ? 'selected' : '' ?>
                 >
                        <?= sprintf('%s - %s %s %s', $vehicle['nick'], $vehicle['make'], $vehicle['model'], $vehicle['year']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input name="date" class="form-control" type="date" value="<?= $entry['date'] ?? date("Y-m-d") ?>" required />
    </div>
    <div class="mb-3">
        <label for="gallons" class="form-label">Gallons</label>
        <div class="input-group">
        <input
            name="gallons"
            class="form-control"
            type="number"
            step="0.01"
            min="0"
            max="50"
            value="<?= $entry['gallons'] ?? '' ?>"
            required
        />
            <span class="input-group-text">gal.</span>
        </div>
    </div>
    <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input
                name="total"
                class="form-control"
                type="text"
                value="<?= $entry['total'] ?? '' ?>"
                required
            />
        </div>
    </div>
    <div class="mb-3">
        <label for="trip" class="form-label">Trip</label>
        <div class="input-group">
            <input
                name="trip"
                class="form-control"
                type="number"
                step="1"
                min="0"
                value="<?= $entry['trip'] ?? ''?>"
                required
            />
            <span class="input-group-text">miles</span>
        </div>
    </div>
    <div class="mb-3">
        <label for="odometer" class="form-label">Odometer</label>
        <div class="input-group">
            <input
                name="odometer"
                class="form-control"
                type="number"
                step="1"
                min="0"
                value="<?= $entry['odometer'] ?? '' ?>"
                required
            />
            <span class="input-group-text">miles</span>
        </div>
    </div>
    <div class="mb-3">
        <button
            type="submit"
            class="btn btn-primary"
            hx-post="/entry"
            hx-target="#entries"
        >Submit</button>
    </div>
</form>
