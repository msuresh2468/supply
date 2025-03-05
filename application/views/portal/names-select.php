<select class="form-select input_style" id="hospital_name" name="hospital_name[]" aria-label="Default select example" >
    <option selected>Select Hospital Name</option>
    <?php
    foreach ($hospital_names as $hospital_name) {
    ?>
        <option value="<?php echo $hospital_name['id']; ?>"><?php echo $hospital_name['name']; ?></option>
    <?php }
    ?>
</select>