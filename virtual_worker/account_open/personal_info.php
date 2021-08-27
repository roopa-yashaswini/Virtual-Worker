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
        <input type="text" class="form-control mb-3 d-none" name="guardian_name" id="guardian_name" placeholder="Guardian Name" value="<?php echo isset($_POST["guardian_name"]) ? $_POST["guardian_name"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="guardian_err"><?php echo $guardian_err; ?></small>
        </span>
        <input type="text" class="form-control mb-3 d-none" name="relation" id="relation" placeholder="Relation" value="<?php echo isset($_POST["relation"]) ? $_POST["relation"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="relation_err"><?php echo $relation_err; ?></small>
        </span>



        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-sm-3">Gender</div>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Male") echo "checked";?> value="Male">
                            <label class="form-check-label" for="male">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Female") echo "checked";?> value="Female">
                            <label class="form-check-label" for="female">F</label>
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
        <input type="text" class="form-control mb-3" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo isset($_POST["nationality"]) ? $_POST["nationality"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="nationality_err"><?php echo $nationality_err; ?></small>
        </span>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-md-4">Have PanCard?</div>
                    <div class="col-md-8" id="pan_exists">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pan_yes" name="pan_exists" <?php if (isset($_POST['pan_exists']) && $_POST['pan_exists']=="T") echo "checked";?> value="T">
                            <label class="form-check-label" for="pan_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pan_no" name="pan_exists" <?php if (isset($_POST['pan_exists']) && $_POST['pan_exists']=="F") echo "checked";?> value="F">
                            <label class="form-check-label" for="pan_no">No</label>
                        </div>
                    </div>
                    <span class="help-block" style="color:red">
                            <small id="nationality_err"><?php echo $pan_exists_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="pan" id="pan" placeholder="PAN No" class="form-control d-none" id="pan" value="<?php echo isset($_POST["pan"]) ? $_POST["pan"] : ''; ?>"/>
                <span class="help-block" style="color:red">
                        <small id="pan_err"><?php echo $pan_err; ?></small>
                </span>
            </div>
        </div>
        <input type="text" class="form-control mb-3" name="aadhar_no" id="aadhar_no" placeholder="Aadhar number" value="<?php echo isset($_POST["aadhar_no"]) ? $_POST["aadhar_no"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="aadhar_err"><?php echo $aadhar_err; ?></small>
        </span>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
