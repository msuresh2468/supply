<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    $("#rowAdd").click(function() {
        var length = $('new_1').length;
        var i = parseInt(length) + parseInt(1);
        newFirmAdd =
            `<hr style="border-color:red;opacity:1"><div class="row purchase_order_form">
                <div class="col-md-3">
                    <div class="mb-3 d-flex align-items-end">
                        <label for="firm_name" class="form-label flex-1">Firm Name</label>
                        <input type="text" class="form-control flex-1 input_style new_1" id="firm_name` + i + `" name="firm_name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 d-flex align-items-end">
                        <label for="item_name" class="form-label flex-1">Item Name</label>
                        <input type="text" class="form-control flex-1 input_style" id="item_name` + i + `" name="item_name">
                    </div>
                </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Model</label>
                                    <input type="text" class="form-control flex-1 input_style" id="model" name="model">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_qty" name="item_qty">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="text" class="form-control flex-1 input_style" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_amt" class="form-label flex-1">Item Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_amt" name="item_amt">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Hospital Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="hospital_name" name="hospital_name">
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
                                    <label for="supply_due_date" class="form-label flex-1">Supply Due Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="supply_due_date" name="supply_due_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-2 d-flex align-items-end">
                                    <label for="is_dd" class="form-label flex-1">Is DD/BG?</label>
                                    <label><input type="radio" name="is_dd" id="is_dd_yes` + i + `" class="is_dd_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_dd" id="is_dd_no" class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_number" class="form-label flex-1">DD/BG Number</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_number` + i + `" name="dd_number" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_date" class="form-label flex-1">DD/BG Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_date` + i + `" name="dd_date" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_amt" class="form-label flex-1">DD/BG Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_amt` + i + `" name="dd_amt" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end">
                                    <label for="is_agreement" class="form-label flex-1">Is Agreement?</label>
                                    <label><input type="radio" name="is_agreement" id="is_agreement_yes" class="is_agreement_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_agreement" id="is_agreement_no" class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_no" class="form-label flex-1">Agreement No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="agreement_no" name="agreement_no" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_date" class="form-label flex-1">Agreement Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="agreement_date" name="agreement_date" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <input type="text" class="form-control flex-1 input_style" id="supply_status" name="supply_status">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_date" class="form-label flex-1">Delivery Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="delivery_date" name="delivery_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="installation_date" class="form-label flex-1">Installation Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="installation_date" name="installation_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end">
                                    <label for="is_bills_submit" class="form-label flex-1">Is Bills Submitted?</label>
                                    <label><input type="radio" name="is_bills_submit" id="is_bills_submit_yes" class="is_bills_submit_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_bills_submit" id="is_bills_submit_no" class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="bills_to_be_submit" class="form-label flex-1">Bills to be Submitted</label>
                                    <input type="text" class="form-control flex-1 input_style" id="bills_to_be_submit" name="bills_to_be_submit" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="received_amt" name="received_amt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="balance_amt" class="form-label flex-1">Balance Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="balance_amt" name="balance_amt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="remarks" class="form-label flex-1">Remarks</label>
                                    <input type="text" class="form-control flex-1 input_style" id="remarks" name="remarks">
                                </div>
                            </div></div>`;

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