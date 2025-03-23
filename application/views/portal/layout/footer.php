<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script>
    var counter = 0;
    $("#rowAdd").click(function() {
        counter++;
        var length = $('.purchase_order_form').length;
        var i = parseInt(length) + parseInt(1);
        newFirmAdd =
            `<hr style="border-color:red;opacity:1"><div class="row purchase_order_form">
                            <div>
                                <p class="fw-bold mb-0">Item Details</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_name" name="item_name[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Make & Model</label>
                                    <input type="text" class="form-control flex-1 input_style" id="model" name="model[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_qty_` + i + `" name="item_qty[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="text" class="form-control flex-1 input_style" id="unit_rate_` + i + `" name="unit_rate[]">
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Hospital Details</p>
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
                                        <select class="form-select input_style" id="hospital_name_` + i + `[]" name="hospital_name_` + i + `[]" aria-label="Default select example multiple">
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
    $(document).ready(function() {
        $('#add_form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            var formData = $(this).serialize();
            //console.log(formData);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Purchase_Orders/calc') ?>",
                //dataType: "JSON",
                data: formData,
                beforeSend: function() {
                    $('#add_po').val('Wait...');
                    $('#add_po').attr('disabled', 'disabled');
                },
                // success: function(data) {
                //     var len = data.length;
                //     $('#add_po').val('Add');
                //     $('#add_po').attr('disabled', false);
                //     //$('#form').trigger('reset');
                //     $('#response').html('PO Added Successfully....')
                // },
                success: function(response) {
                    $('#add_po').val('Submit');
                    $('#add_po').attr('disabled', false);
                    console.log(response);
                    if(response == '"New PO Added Successfully"'){
                        $('#error').css('display','none');
                        $('#response').append('<span class="py-2">New PO Added Successfully</span>');
                        $('#add_form').trigger('reset');
                        //window.location.href = '<?php echo base_url('portal/purchase-orders') ?>';
                       
                    }
                    else{
                        $('#error').append('Items Amount must be equal to the Gross Amount');
                        //$('#response').html(response);
                    }
                   
                },
                error: function(response, xhr, status, error) {
                    // Handle errors
                    console.log('error')
                    $('#response').html('Items Amount must be equal to Gross Amount')
                    // $('#response').html('An error occurred: ' + error);
                }
            });
        });
    });
</script>
<script>
    function hospital_typeChange(type) {
        //alert($('#'+type).val());

        var type_id = $('#' + type).val();
        //alert(type);
        var responseAppend = type == 'type' ? '#HospitalBox' : '#HospitalBox-' + type.split('-')[1];
        //alert(responseAppend);
        $.ajax({
            url: '<?php echo base_url('Purchase_Orders/hospitalList') ?>/',
            type: 'POST',
            data: {
                type_id: type_id,
                count: counter
            },
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response['hospital_names']) {
                    $(responseAppend).html(response['hospital_names']);
                    $('.hospital_name').selectpicker();
                }
            }
        });
    }
</script>

<script>
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#filter_search tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(document).ready(function() {
        // var x = $('#amount').text();
        // console.log(x);
        // x = x.toString();
        // var lastThree = x.substring(x.length - 3);
        // var otherNumbers = x.substring(0, x.length - 3);
        // if (otherNumbers != '')
        //     lastThree = ',' + lastThree;
        // var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
        // $('#amount').append(res);
        var gross_amt = $('#gross_amt').val();

        var pay_60 = $('#pay_60').html();
        var pay_30 = $('#pay_30').html();
        var pay_90 = $('#pay_90').html();
        var pay_10 = $('#pay_10').html();
        var pay_amt = parseInt(pay_60) + parseInt(pay_30) + parseInt(pay_10);
        $('#pending_amt').append(pay_amt);

        $(function() {
            $('#datepicker').datepicker();
        });
        $('.dd_field input:radio').click(function() {
            $("#dd_number").prop("disabled", true);
            $("#dd_date").prop("disabled", true);
            $("#dd_amt").prop("disabled", true);
            $("#dd_validity").prop("disabled", true);
            if ($(this).hasClass('is_dd_yes')) {
                $("#dd_number").prop("disabled", false);
                $("#dd_date").prop("disabled", false);
                $("#dd_amt").prop("disabled", false);
                $("#dd_validity").prop("disabled", false);
            }
        });
        $('.agreement_field input:radio').click(function() {
            $("#agreement_no").prop("disabled", true);
            $("#agreement_date").prop("disabled", true);
            if ($(this).hasClass('is_agreement_yes')) {
                $("#agreement_no").prop("disabled", false);
                $("#agreement_date").prop("disabled", false);
            }
        });
        $('.bills_field input:radio').click(function() {
            $("#bills_to_be_submit").prop("disabled", true);
            $("#bill_60").prop("disabled", true);
            $("#bill_30").prop("disabled", true);
            $("#bill_90").prop("disabled", true);
            $("#bill_10").prop("disabled", true);
            $("#is_payment_submit_yes").prop("disabled", true);
            $("#is_payment_submit_no").prop("disabled", true);
            if ($(this).hasClass('is_bills_submit_yes')) {
                $("#bills_to_be_submit").prop("disabled", false);
                $("#bill_60").prop("disabled", false);
                $("#bill_30").prop("disabled", false);
                $("#bill_90").prop("disabled", false);
                $("#bill_10").prop("disabled", false);
                $("#is_payment_submit_yes").prop("disabled", false);
                $("#is_payment_submit_no").prop("disabled", false);
            }
        });
        $('.payment_field input:radio').click(function() {
            $("#payment_60").prop("disabled", true);
            $("#payment_30").prop("disabled", true);
            $("#payment_90").prop("disabled", true);
            $("#payment_10").prop("disabled", true);
            if ($(this).hasClass('is_payment_submit_yes')) {
                $("#payment_60").prop("disabled", false);
                $("#payment_30").prop("disabled", false);
                $("#payment_90").prop("disabled", false);
                $("#payment_10").prop("disabled", false);
            }
        });
        $('.payment_field_60 input:radio').click(function() {
            $("#payment_60_amt").prop("disabled", true);
            $("#payment_60_date").prop("disabled", true);
            $("#ldc_amount_1").prop("disabled", true);
            $("#deductions_1").prop("disabled", true);
            if ($(this).hasClass('is_payment_60_yes')) {
                $("#payment_60_amt").prop("disabled", false);
                $("#payment_60_date").prop("disabled", false);
                $("#ldc_amount_1").prop("disabled", false);
                $("#deductions_1").prop("disabled", false);
            }
        });
        $('.payment_field_30 input:radio').click(function() {
            $("#payment_30_amt").prop("disabled", true);
            $("#payment_30_date").prop("disabled", true);
            $("#ldc_amount_2").prop("disabled", true);
            $("#deductions_2").prop("disabled", true);
            if ($(this).hasClass('is_payment_30_yes')) {
                $("#payment_30_amt").prop("disabled", false);
                $("#payment_30_date").prop("disabled", false);
                $("#ldc_amount_2").prop("disabled", false);
                $("#deductions_2").prop("disabled", false);
            }
        });
        $('.payment_field_90 input:radio').click(function() {
            $("#payment_90_amt").prop("disabled", true);
            $("#payment_90_date").prop("disabled", true);
            $("#ldc_amount_3").prop("disabled", true);
            $("#deductions_3").prop("disabled", true);
            if ($(this).hasClass('is_payment_90_yes')) {
                $("#payment_90_amt").prop("disabled", false);
                $("#payment_90_date").prop("disabled", false);
                $("#ldc_amount_3").prop("disabled", false);
                $("#deductions_3").prop("disabled", false);
            }
        });
        $('.payment_field_10 input:radio').click(function() {
            $("#payment_10_amt").prop("disabled", true);
            $("#payment_10_date").prop("disabled", true);
            if ($(this).hasClass('is_payment_10_yes')) {
                $("#payment_10_amt").prop("disabled", false);
                $("#payment_10_date").prop("disabled", false);
            }
        });
        $('.bills_field_60 input:radio').click(function() {
            $("#bill_60_amt").prop("disabled", true);
            $("#bill_60_date").prop("disabled", true);
            if ($(this).hasClass('is_bills_60_yes')) {
                $("#bill_60_amt").prop("disabled", false);
                $("#bill_60_date").prop("disabled", false);
            }
        });
        $('.bills_field_30 input:radio').click(function() {
            $("#bill_30_amt").prop("disabled", true);
            $("#bill_30_date").prop("disabled", true);
            if ($(this).hasClass('is_bills_30_yes')) {
                $("#bill_30_amt").prop("disabled", false);
                $("#bill_30_date").prop("disabled", false);
            }
        });
        $('.bills_field_90 input:radio').click(function() {
            $("#bill_90_amt").prop("disabled", true);
            $("#bill_90_date").prop("disabled", true);
            if ($(this).hasClass('is_bills_90_yes')) {
                $("#bill_90_amt").prop("disabled", false);
                $("#bill_90_date").prop("disabled", false);
            }
        });
        $('.bills_field_10 input:radio').click(function() {
            $("#bill_10_amt").prop("disabled", true);
            $("#bill_10_date").prop("disabled", true);
            if ($(this).hasClass('is_bills_10_yes')) {
                $("#bill_10_amt").prop("disabled", false);
                $("#bill_10_date").prop("disabled", false);
            }
        });
        $('.supply_status input:radio').click(function() {
            $("#delivery_date").prop("disabled", true);
            $("#installation_date").prop("disabled", true);
            $("#warranty_years").prop("disabled", true);
            $("#warranty_date").prop("disabled", true);
            if ($(this).hasClass('supply_status_yes')) {
                $("#delivery_date").prop("disabled", false);
                $("#installation_date").prop("disabled", false);
                $("#warranty_years").prop("disabled", false);
                $("#warranty_date").prop("disabled", false);
            }
        });
    })
</script>
<script>

</script>
</body>

</html>