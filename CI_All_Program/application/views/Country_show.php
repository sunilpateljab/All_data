
<select>
    <option>---select country------</option>
    <?php
    foreach ($ret->result() as $row) {
        ?>

        <option><?php echo ucfirst($row->country_name); ?></option>
        <?php
    }
    ?>
</select>