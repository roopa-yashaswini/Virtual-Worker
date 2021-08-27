<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Personal Information</h2>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" />
                <span class="help-block" style="color:red">
                        <small id="fname_err"><?php echo $fname_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="mname" placeholder="Middle Name" class="form-control" value="<?php echo isset($_POST["mname"]) ? $_POST["mname"] : ''; ?>"/>
                <span class="help-block" style="color:red">
                        <small id="mname_err"><?php echo $mname_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>"/>
                <span class="help-block" style="color:red">
                        <small id="lname_err"><?php echo $lname_err; ?></small>
                </span>
            </div>
        </div>
        <input type="text" name="card_name" id="card_name" placeholder="Name on the Card" class="form-control  mb-3" value="<?php echo isset($_POST["card_name"]) ? $_POST["card_name"] : ''; ?>"/>
        <span class="help-block mb-3" style="color:red">
                <small id="card_name_err"><?php echo $card_name_err; ?></small>
        </span>

        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-sm-3">Gender</div>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Male") echo "checked";?> value="Male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Female") echo "checked";?> value="Female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="third" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Third Gender") echo "checked";?> value="Third Gender">
                            <label class="form-check-label" for="third">Other</label>
                        </div>
                    </div>
                    <span class="help-block" style="color:red">
                            <small id="gender_err"><?php echo $gender_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-6">
                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>">
                <span class="help-block" style="color:red">
                        <small id="dob_err"><?php echo $dob_err; ?></small>
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-md-3">Nationality</div>
                    <div class="col-md-9" id="nationality">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="indian" name="nationality" <?php if (isset($_POST['nationality']) && $_POST['nationality']=="Indian") echo "checked";?> value="Indian">
                            <label class="form-check-label" for="indian">Indian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="foreign" name="nationality" <?php if (isset($_POST['nationality']) && $_POST['nationality']=="Foreign") echo "checked";?> value="Foreign">
                            <label class="form-check-label" for="foreign">Foreigner</label>
                        </div>
                    </div>
                    <span class="help-block" style="color:red">
                            <small id="nationality_err"><?php echo $nationality_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="pan" id="pan" placeholder="PAN No" class="form-control d-none" id="pan" value="<?php echo isset($_POST["pan"]) ? $_POST["pan"] : ''; ?>"/>
                <span class="help-block" style="color:red">
                        <small id="pan_err"><?php echo $pan_err; ?></small>
                </span>
                <input type="text" name="passport" id="passport" placeholder="Passport No" class="form-control d-none" id="passport" value="<?php echo isset($_POST["passport"]) ? $_POST["passport"] : ''; ?>" />
                <span class="help-block" style="color:red">
                        <small id="passport_err"><?php echo $passport_err; ?></small>
                </span>
            </div>
        </div>
        <input type="text" class="form-control mb-3" name="mobile" id="mobile" placeholder="Mobile No" value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="mobile_err"><?php echo $mobile_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3" name="alt_mobile" id="alt_mobile" placeholder="Alternate Mobile No" value="<?php echo isset($_POST["alt_mobile"]) ? $_POST["alt_mobile"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="alt_mobile_err"><?php echo $alt_mobile_err; ?></small>
        </span>
        <input type="number" name="dependants" id="dependants" class="form-control" placeholder="No of Dependents" value="<?php echo isset($_POST["dependants"]) ? $_POST["dependants"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="dependants_err"><?php echo $dependants_err; ?></small>
        </span>

    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
