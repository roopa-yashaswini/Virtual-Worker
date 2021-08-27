<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Bank Relationship</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-sm-3">Customer</div>
                    <div class="col-sm-9" id="customer_div">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="new" name="customer_type" <?php if (isset($_POST['customer_type']) && $_POST['customer_type']=="New") echo "checked";?> value="New">
                            <label class="form-check-label" for="new">New</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="existing" name="customer_type" <?php if (isset($_POST['customer_type']) && $_POST['customer_type']=="Existing") echo "checked";?> value="Existing">
                            <label class="form-check-label" for="existing">Existing</label>
                        </div>
                    </div>
                    <span class="help-block" style="color:red">
                            <small id="customer_type_err"><?php echo $customer_type_err; ?></small>
                    </span>
                </div>
            </div>
        </div>
        <input type="text" class="form-control mb-3 d-none" placeholder="Account/Loan Number" id="existing_no" name="existing_no" value="<?php echo isset($_POST["existing_no"]) ? $_POST["existing_no"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="existing_no_err"><?php echo $existing_no_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3 d-none" placeholder="Customer ID Number" id="customer_no" name="customer_no" value="<?php echo isset($_POST["customer_no"]) ? $_POST["customer_no"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="customer_no_err"><?php echo $customer_no_err; ?></small>
        </span>
    </div>
        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
