<select class="form-select input_style hospital_name" id="hospital_name" name="hospital_name_<?php echo $counter;?>[]" aria-label="Default select example" multiple>
    <option>Select Hospital Name</option>
    <?php
    foreach ($hospital_names as $hospital_name) {
    ?>
        <option value="<?php echo $hospital_name['name']; ?>"><?php echo $hospital_name['name']; ?></option>
    <?php }
    ?>
</select>