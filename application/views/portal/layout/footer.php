<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function(){
    $('#type').change(function(){
        var type_id = $(this).val();
        //alert(type_id);
        $.ajax({
            url: '<?php echo base_url('Purchase_Orders/hospitalList')?>/',
            type: 'POST',
            data: {type_id:type_id},
            dataType: 'json',
            success: function(response){
                console.log(response)
                if(response['hospital_names']) {
                    $('#HospitalBox').html(response['hospital_names']);
                }
            }
        });
    });
});
</script>
<script>
    $("#rowAdd").click(function() {
        var length = $('new_1').length;
        var i = parseInt(length) + parseInt(1);
        newFirmAdd =
            `<hr style="border-color:red;opacity:1"><div class="row purchase_order_form">
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_qty" name="item_qty">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select District</label>
                                    <select class="form-select input_style flex-1" id="district" name="district[]">
                                        <option>Select District</option>
                                        <?php
                                        foreach ($types as $type) {
                                        ?>
                                            <option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select Hospital Type</label>
                                    <select class="form-select input_style flex-1" id="type" name="type[]">
                                        <option>Select Hospital Type</option>
                                        <?php
                                        foreach ($types as $type) {
                                        ?>
                                            <option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Select Hospital Name</label>
                                    <div id='HospitalBox' class="flex-1">
                                        <select class="form-select input_style" id="hospital_name[]" name="hospital_name[]" aria-label="Default select example">
                                            <option value=''>Select Hospital Name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_period" class="form-label flex-1">Delivery Period</label>
                                    <input type="text" class="form-control flex-1 input_style" id="delivery_period" name="delivery_period">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="scheme" class="form-label flex-1">Scheme</label>
                                    <input type="text" class="form-control flex-1 input_style" id="scheme" name="scheme">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <input type="text" class="form-control flex-1 input_style" id="supply_status" name="supply_status">
                                </div>
                            </div>`;

        $('#addinput').append(newFirmAdd);
    });
    $("body").on("click", "#DeleteRow", function() {
        $(this).parents("#row").remove();
    })
</script>
<script>
    $(document).ready(function() {
        $(function() {
            $('#datepicker').datepicker();
        });
        $('input:radio').click(function() {
            $("#dd_number").prop("disabled", true);
            $("#dd_date").prop("disabled", true);
            $("#dd_amt").prop("disabled", true);
            $("#dd_number1").prop("disabled", true);
            $("#dd_date1").prop("disabled", true);
            $("#dd_amt1").prop("disabled", true);
            $("#agreement_no").prop("disabled", true);
            $("#agreement_date").prop("disabled", true);
            $("#bills_to_be_submit").prop("disabled", true);
            if ($(this).hasClass('is_dd_yes')) {
                $("#dd_number").prop("disabled", false);
                $("#dd_date").prop("disabled", false);
                $("#dd_amt").prop("disabled", false);
            }
            if ($(this).hasClass('is_dd_yes1')) {
                $("#dd_number1").prop("disabled", false);
                $("#dd_date1").prop("disabled", false);
                $("#dd_amt1").prop("disabled", false);
            }
            if ($(this).hasClass('is_agreement_yes')) {
                $("#agreement_no").prop("disabled", false);
                $("#agreement_date").prop("disabled", false);
            }
            if ($(this).hasClass('is_bills_submit_yes')) {
                $("#bills_to_be_submit").prop("disabled", false);
            }
        });
    })
</script>
</body>

</html>