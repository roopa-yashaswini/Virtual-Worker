<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Occupation Details</h2>
        <div class="form-group row">
            <div class="col-md-2">Occupation</div>
            <div class="col-md-8" id="occupation_type">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="occupation_salaried" value="Salaried" name="occupation_type">
                    <label class="form-check-label" for="occupation_salaried">Salaried</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="occupation_self" value="Self Employed" name="occupation_type">
                    <label class="form-check-label" for="occupation_self">Self Employed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="occupation_other" value="Other" name="occupation_type">
                    <label class="form-check-label" for="occupation_other">Other</label>
                </div>
                <input type="text" name="occupation_other_type" id="occupation_other_type" class="form-control d-none" placeholder="Occupation Type">
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="occupation_type_err"><?php echo $occupation_type_err; ?></small>
            </span>
        </div>
        <div class="form-group row d-none" id="salaried">
            <div class="col-md-2">Employed with</div>
            <div class="col-md-8">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_private" value="Private" name="salaried_type">
                    <label class="form-check-label" for="salary_private">Private</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_public" value="Public" name="salaried_type">
                    <label class="form-check-label" for="salary_public">Public</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_partner" value="Partnership" name="salaried_type">
                    <label class="form-check-label" for="salary_partner">Partnership</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_proprietor" value="Proprietor" name="salaried_type">
                    <label class="form-check-label" for="salary_prprietor">Proprietor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_govt" value="Government" name="salaried_type">
                    <label class="form-check-label" for="salary_govt">Government</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_multinational" value="Multinational" name="salaried_type">
                    <label class="form-check-label" for="salary_multinational">Multinational</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="salary_other" value="Other" name="salaried_type">
                    <label class="form-check-label" for="salary_other">Other</label>
                </div>
                <input type="text" name="Occupation" id="salaried_other_type" class="form-control d-none" placeholder="Salary Type">
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="occupation_type_err"><?php echo $salaried_err; ?></small>
            </span>
        </div>
        <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control mb-3" value="<?php echo isset($_POST["designation"]) ? $_POST["designation"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="designation_err"><?php echo $designation_err; ?></small>
        </span>
        <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control mb-3" value="<?php echo isset($_POST["company_name"]) ? $_POST["company_name"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="company_name_err"><?php echo $company_name_err; ?></small>
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
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />

</fieldset>
