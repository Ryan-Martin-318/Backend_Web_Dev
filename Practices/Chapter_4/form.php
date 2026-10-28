<!-- form.php -->

<form action="index.php" method="get" class="mt-4">
    <div class="mb-3">
        <label for="numDays" class="form-label">
            How many days would you like to add?
        </label>

        <select
            name="numDays"
            id="numDays"
            class="form-select">
            <?php
            for ($i = 0; $i <= 30; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>
    </div>

    <input
        type="submit"
        value="Calculate Date"
        class="btn btn-primary">
</form>
