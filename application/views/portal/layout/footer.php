<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $("#rowAdd").click(function() {
        var length = $('.purchase_order_form').length;
        var i = parseInt(length) + parseInt(1);
        newFirmAdd =
            `<hr style="border-color:red;opacity:1"><div class="row purchase_order_form">
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_qty" name="item_qty[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select District</label>
                                    <select class="form-select input_style flex-1" id="district" name="district[]">
                                        <option>Select District</option>
                                        <option value="Srikakulam">Srikakulam</option>
                                        <option value="Parvathipuram Manyam">Parvathipuram Manyam</option>
                                        <option value="Vizianagaram">Vizianagaram</option>
                                        <option value="Visakhapatnam">Visakhapatnam</option>   
                                        <option value="Alluri Sitharama Raju">Alluri Sitharama Raju</option>
                                        <option value="Anakapalli">Anakapalli</option>
                                        <option value="Kakinada">Kakinada</option>
                                        <option value="East Godavari">East Godavari</option>
                                        <option value="Dr. B. R. Ambedkar Konaseema">Dr. B. R. Ambedkar Konaseema</option>  
                                        <option value="Eluru">Eluru</option>
                                        <option value="West Godavari">West Godavari</option>
                                        <option value="NTR">NTR</option>
                                        <option value="Krishna">Krishna</option>
                                        <option value="Palnadu">Palnadu</option>
                                        <option value="Guntur">Guntur</option>
                                        <option value="Bapatla">Bapatla</option>
                                        <option value="Sri Potti Sriramulu Nellore">Sri Potti Sriramulu Nellore</option>
                                        <option value="Prakasam">Prakasam</option>
                                        <option value="Kurnool">Kurnool</option>   
                                        <option value="Nandyal">Nandyal</option>
                                        <option value="Anantapuramu">Anantapuramu</option>
                                        <option value="Sri Sathya Sai">Sri Sathya Sai</option>
                                        <option value="YSR">YSR</option>
                                        <option value="Annamayya">Annamayya</option>    
                                        <option value="Tirupati">Tirupati</option>
                                        <option value="Chittoor">Chittoor</option>                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select Hospital Type</label>
                                    <select onchange="hospital_typeChange('type-` + i + `')" class="form-select hospital_type input_style flex-1" id="type-` + i + `" name="type[]">
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
                                    <div id='HospitalBox-` + i + `' class="flex-1">
                                        <select class="form-select input_style" id="hospital_name[]" name="hospital_name[]" aria-label="Default select example">
                                            <option value=''>Select Hospital Name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>`;

        $('#addinput').append(newFirmAdd);
    });
    $("body").on("click", "#DeleteRow", function() {
        $(this).parents("#row").remove();
    })
</script>
<script>
    function hospital_typeChange(type){
        //alert($('#'+type).val());

        var type_id = $('#'+type).val();
        //alert(type);
        var responseAppend = type == 'type' ? '#HospitalBox' : '#HospitalBox-'+type.split('-')[1];
        //alert(responseAppend);
        $.ajax({
            url: '<?php echo base_url('Purchase_Orders/hospitalList') ?>/',
            type: 'POST',
            data: {
                type_id: type_id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response['hospital_names']) {
                    $(responseAppend).html(response['hospital_names']);
                }
            }
        });
    }
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