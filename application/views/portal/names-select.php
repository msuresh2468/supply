<select class="form-select input_style" id="hospital_names" name="hospital_names" aria-label="Default select example">
    <option selected>Select Type</option>
    <?php
    foreach ($hospital_names as $hospital_name) {
    ?>
        <option value="<?php echo $hospital_name['id']; ?>"><?php echo $hospital_name['name']; ?></option>
    <?php }
    ?>
</select>