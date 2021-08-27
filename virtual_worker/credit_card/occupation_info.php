<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Occupation Details</h2>
        <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control mb-3" value="<?php echo isset($_POST["company_name"]) ? $_POST["company_name"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="company_name_err"><?php echo $company_name_err; ?></small>
        </span>
        <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control mb-3" value="<?php echo isset($_POST["designation"]) ? $_POST["designation"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="designation_err"><?php echo $designation_err; ?></small>
        </span>
        <input type="text" name="company_address" id="company_address" placeholder="Company Address" class="form-control mb-3" value="<?php echo isset($_POST["company_address"]) ? $_POST["company_address"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="company_address_err"><?php echo $company_address_err; ?></small>
        </span>
        <input type="text" name="company_pincode" id="company_pincode" placeholder="Pincode" class="form-control mb-3" value="<?php echo isset($_POST["company_pincode"]) ? $_POST["company_pincode"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="company_pincode_err"><?php echo $company_pincode_err; ?></small>
        </span>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="company_city" id="company_city" placeholder="City" class="form-control mb-3" value="<?php echo isset($_POST["company_city"]) ? $_POST["company_city"] : ''; ?>">
                <span class="help-block" style="color:red">
                        <small id="company_city_err"><?php echo $company_city_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="company_state" id="company_state" placeholder="State" class="form-control mb-3" value="<?php echo isset($_POST["company_state"]) ? $_POST["company_state"] : ''; ?>">
                <span class="help-block" style="color:red">
                        <small id="company_state_err"><?php echo $company_state_err; ?></small>
                </span>
            </div>
        </div>
        <br>
        <input type="text" name="gross_income"id="gross_income" placeholder="Monthly Gross Income" class="form-control mb-3" value="<?php echo isset($_POST["gross_income"]) ? $_POST["gross_income"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="gross_income_err"><?php echo $gross_income_err; ?></small>
        </span>
        <input type="text" name="gross_expense" id="gross_expense" placeholder="Monthly Expenses" class="form-control mb-3" value="<?php echo isset($_POST["gross_expense"]) ? $_POST["gross_expense"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="gross_expense_err"><?php echo $gross_expense_err; ?></small>
        </span>
        <div class="form-group row">
            <div class="col-md-3">Occupation Type</div>
            <div class="col-md-9" id="occupation_type">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salaried" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="salaried") echo "checked";?> value="salaried">
                    <label class="form-check-label" for="salaried">Salaried</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="self_employed" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="self_employed") echo "checked";?> value="self_employed">
                    <label class="form-check-label" for="self_employed">Self Employed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="business" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="business") echo "checked";?> value="business">
                    <label class="form-check-label" for="business">Business</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="professional" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="professional") echo "checked";?> value="professional">
                    <label class="form-check-label" for="professional">Professional</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="retired" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="retired") echo "checked";?> value="retired">
                    <label class="form-check-label" for="retired">Retired</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="other_occupation" name="occupation_type" <?php if (isset($_POST['occupation_type']) && $_POST['occupation_type']=="other") echo "checked";?> value="other">
                    <label class="form-check-label" for="other_occupation">Other</label>
                </div>
            </div>
            <span class="help-block" style="color:red">
                    <small id="occupation_type_err"><?php echo $occupation_type_err; ?></small>
            </span>
        </div>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />

</fieldset>
