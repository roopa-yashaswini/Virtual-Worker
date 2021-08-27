<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Address Information</h2>
        <input type="text" class="form-control mb-3" name="curr_address" id="curr_address" placeholder="Current Adddress" value="<?php echo isset($_POST["curr_address"]) ? $_POST["curr_address"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="address_err"><?php echo $address_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo isset($_POST["pincode"]) ? $_POST["pincode"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="pincode_err"><?php echo $pincode_err; ?></small>
        </span>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="district" id="district" placeholder="District" value="<?php echo isset($_POST["district"]) ? $_POST["district"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="district_err"><?php echo $district_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="city" id="city" placeholder="City" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="city_err"><?php echo $city_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control mb-3" name="state" id="state" placeholder="State" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="state_err"><?php echo $state_err; ?></small>
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
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="pg" name="residence_type" <?php if (isset($_POST['residence_type']) && $_POST['residence_type']=="PG Accomodation") echo "checked";?> value="PG Accomodation">
                    <label class="form-check-label" for="pg">PG Accomodation</label>
                </div>
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="residence_type_err"><?php echo $residence_type_err; ?></small>
            </span>
        </div>
        <label for="form-label" for="stay_period">Time period at current Residence(year)</label>
        <input type="text" class="form-control mb-3" id="stay_period" name="stay_period" placeholder="Time period at current Residence" value="<?php echo isset($_POST["stay_period"]) ? $_POST["stay_period"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="stay_period_err"><?php echo $stay_period_err; ?></small>
        </span>
        <div class="form-group row">
            <div class="col-md-3">Vehicle Type</div>
            <div class="col-md-9" id="vehicle">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="four_wheel" name="vehicle_type" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type']=="four_wheel") echo "checked";?> value="four_wheel">
                    <label class="form-check-label" for="four_wheel">Four Wheeler</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="two_wheel" name="vehicle_type" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type']=="two_wheel") echo "checked";?> value="two_wheel">
                    <label class="form-check-label" for="two_wheel">Two Wheeler</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="others" name="vehicle_type" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type']=="others") echo "checked";?> value="others">
                    <label class="form-check-label" for="others">Others</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="none" name="vehicle_type" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type']=="none") echo "checked";?> value="none">
                    <label class="form-check-label" for="none">None</label>
                </div>
            </div>
            <span class="help-block mb-3" style="color:red">
                    <small id="vehicle_err"><?php echo $vehicle_err; ?></small>
            </span>
        </div>
        <input type="text" class="form-control d-none mb-3" name="vehicle_make" id="vehicle_make" placeholder="Vehicle Make" id="vehicle_make" value="<?php echo isset($_POST["vehicle_make"]) ? $_POST["vehicle_make"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="vehicle_make_err"><?php echo $vehicle_make_err; ?></small>
        </span>
        <br>
        <label class="form-label d-none" for="vehicle_year" id="vehicle_yr_lbl">Year of Vehicle Purchase</label>
        <input type="text" class="form-control d-none mb-3" id="vehicle_year" name="vehicle_year" value="<?php echo isset($_POST["vehicle_year"]) ? $_POST["vehicle_year"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="vehicle_year_err"><?php echo $vehicle_year_err; ?></small>
        </span>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
