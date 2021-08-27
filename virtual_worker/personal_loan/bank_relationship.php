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
        <input type="text" class="form-control mb-3 d-none" placeholder="Customer ID Number" id="customer_no" name="customer_no" value="<?php echo isset($_POST["customer_no"]) ? $_POST["customer_no"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="customer_no_err"><?php echo $customer_no_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="other_acc_no" id="other_acc_no" placeholder="Other Account no" value="<?php echo isset($_POST["other_acc_no"]) ? $_POST["other_acc_no"] : ''; ?>">
        <input type="text" class="form-control mb-3" name="other_acc_bank" id="other_acc_bank" placeholder="Bank Name"  value="<?php echo isset($_POST["other_acc_bank"]) ? $_POST["other_acc_bank"] : ''; ?>">
        <br>
        <label for="loan_amount">Loan Amount</label>
        <input type="number" class="form-control mb-3" name="loan_amount" id="loan_amount" placeholder="Loan Amount" value="<?php echo isset($_POST["loan_amount"]) ? $_POST["loan_amount"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="loan_amount_err"><?php echo $loan_amount_err; ?></small>
        </span>
        <label for="loan_tenure">Loan Tenure</label>
        <input type="number" class="form-control" name="loan_tenure" id="loan_tenure" placeholder="Loan Tenure" value="<?php echo isset($_POST["loan_tenure"]) ? $_POST["loan_tenure"] : ''; ?>">
        <div class="form-text  mb-3">
            Number of months
        </div>
        <span class="help-block" style="color:red">
                <small id="loan_tenure_err"><?php echo $loan_tenure_err; ?></small>
        </span>
    </div>
        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
