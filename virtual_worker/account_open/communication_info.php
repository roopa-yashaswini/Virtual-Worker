<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Address Information</h2>
        <input type="text" class="form-control mb-3" name="curr_address" id="curr_address" placeholder="Current Adddress" value="<?php echo isset($_POST["curr_address"]) ? $_POST["curr_address"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="curr_address_err"><?php echo $curr_address_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="curr_pincode" id="curr_pincode" placeholder="Pincode" value="<?php echo isset($_POST["curr_pincode"]) ? $_POST["curr_pincode"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="curr_pincode_err"><?php echo $curr_pincode_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="curr_district" id="curr_district" placeholder="District" value="<?php echo isset($_POST["curr_district"]) ? $_POST["curr_district"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="curr_district_err"><?php echo $curr_district_err; ?></small>
        </span>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="curr_city" id="curr_city" placeholder="City" value="<?php echo isset($_POST["curr_city"]) ? $_POST["curr_city"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="curr_city_err"><?php echo $curr_city_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="curr_state" id="curr_state" placeholder="State" value="<?php echo isset($_POST["curr_state"]) ? $_POST["curr_state"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="curr_state_err"><?php echo $curr_state_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="curr_country" id="curr_country" placeholder="Country" value="<?php echo isset($_POST["curr_country"]) ? $_POST["curr_country"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="curr_country_err"><?php echo $curr_country_err; ?></small>
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">Permanent Address</div>
            <div class="col-md-8" id="permanent_address_block">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="same_addr" name="permanent_address_check" <?php if (isset($_POST['permanent_address_check']) && $_POST['permanent_address_check']=="T") echo "checked";?> value="T">
                    <label class="form-check-label" for="same_addr">Same as Current Address</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="diff_addr" name="permanent_address_check" <?php if (isset($_POST['permanent_address_check']) && $_POST['permanent_address_check']=="F") echo "checked";?> value="F">
                    <label class="form-check-label" for="diff_addr">No</label>
                </div>
            </div>
            <span class="help-block" style="color:red">
                    <small id="perm_address_check_err"><?php echo $permanent_address_check_err; ?></small>
            </span>
        </div>
        <input type="text" class="form-control mb-3 permanent not-active" name="perm_address" id="perm_address" placeholder="Permanent Adddress" value="<?php echo isset($_POST["perm_address"]) ? $_POST["perm_address"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="perm_address_err"><?php echo $perm_address_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3 permanent not-active" name="perm_pincode" id="perm_pincode" placeholder="Pincode" value="<?php echo isset($_POST["perm_pincode"]) ? $_POST["perm_pincode"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="perm_pincode_err"><?php echo $perm_pincode_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3 permanent not-active" name="perm_district" id="perm_district" placeholder="District" value="<?php echo isset($_POST["perm_district"]) ? $_POST["perm_district"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="perm_district_err"><?php echo $perm_district_err; ?></small>
        </span>
        <div class="form-row permanent not-active">
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="perm_city" id="perm_city" placeholder="City" value="<?php echo isset($_POST["perm_city"]) ? $_POST["perm_city"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="perm_city_err"><?php echo $perm_city_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="perm_state" id="perm_state" placeholder="State" value="<?php echo isset($_POST["perm_state"]) ? $_POST["perm_state"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="perm_state_err"><?php echo $perm_state_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="perm_country" id="perm_country" placeholder="Country" value="<?php echo isset($_POST["perm_country"]) ? $_POST["perm_country"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="perm_country_err"><?php echo $perm_country_err; ?></small>
                </span>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">Type of Residence</div>
            <div class="col-md-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="owned" name="residence_type" <?php if (isset($_POST['residence_type']) && $_POST['residence_type']=="Owned") echo "checked";?> value="Owned">
                    <label class="form-check-label" for="owned">Owned</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rent" name="residence_type" <?php if (isset($_POST['residence_type']) && $_POST['residence_type']=="Rented") echo "checked";?> value="Rented">
                    <label class="form-check-label" for="rent">Rented</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="company" name="residence_type" <?php if (isset($_POST['residence_type']) && $_POST['residence_type']=="Company_provided") echo "checked";?> value="Company_provided">
                    <label class="form-check-label" for="company">Company Provided</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ancestral" name="residence_type" <?php if (isset($_POST['residence_type']) && $_POST['residence_type']=="Ancestral") echo "checked";?> value="Ancestral">
                    <label class="form-check-label" for="ancestral">Ancestral</label>
                </div>
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="residence_type_err"><?php echo $residence_type_err; ?></small>
            </span>
        </div>
        <label for="form-label" for="stay_period">Time period at current Residence</label>
        <input type="text" class="form-control mb-3" id="stay_period" name="stay_period" placeholder="Time period at current Residence" value="<?php echo isset($_POST["stay_period"]) ? $_POST["stay_period"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="stay_period_err"><?php echo $stay_period_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="mobile" id="mobile" placeholder="Mobile No" value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="mobile_err"><?php echo $mobile_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="alt_mobile" id="alt_mobile" placeholder="Alternate Mobile No" value="<?php echo isset($_POST["alt_mobile"]) ? $_POST["alt_mobile"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="alt_mobile_err"><?php echo $alt_mobile_err; ?></small>
        </span>
        <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="email_err"><?php echo $email_err; ?></small>
        </span>
        <div class="form-group row">
            <div class="col-md-4">Instant Alert</div>
            <div class="col-md-8" id="instant_alert">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="alert_yes" name="instant_alert" <?php if (isset($_POST['instant_alert']) && $_POST['instant_alert']=="T") echo "checked";?> value="T" checked disabled>
                    <label class="form-check-label" for="owned">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="alerrt_no" name="instant_alert" <?php if (isset($_POST['instant_alert']) && $_POST['instant_alert']=="F") echo "checked";?> value="F" disabled>
                    <label class="form-check-label" for="rent">No</label>
                </div>
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="residence_type_err"><?php echo $instant_alert_err; ?></small>
            </span>
        </div>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
