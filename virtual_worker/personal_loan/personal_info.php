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
        <input type="text" class="form-control mb-3" name="guardian_name" id="guardian_name" placeholder="Father's / Husband's Name" value="<?php echo isset($_POST["guardian_name"]) ? $_POST["guardian_name"] : ''; ?>">
        <span class="help-block" style="color:red">
                <small id="guardian_err"><?php echo $guardian_err; ?></small>
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
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control mb-3" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo isset($_POST["nationality"]) ? $_POST["nationality"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="nationality_err"><?php echo $nationality_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="pan" id="pan" placeholder="PAN No" class="form-control" id="pan" value="<?php echo isset($_POST["pan"]) ? $_POST["pan"] : ''; ?>"/>
                <span class="help-block" style="color:red">
                        <small id="pan_err"><?php echo $pan_err; ?></small>
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <div class="form-group row">
                    <div class="col-sm-3">Educational Status</div>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="graduate" name="education_level" <?php if (isset($_POST['education_level']) && $_POST['education_level']=="Graduate") echo "checked";?> value="Graduate">
                            <label class="form-check-label" for="graduate">Graduate</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_graduate" name="education_level" <?php if (isset($_POST['education_level']) && $_POST['education_level']=="Post Graduate") echo "checked";?> value="Post Graduate">
                            <label class="form-check-label" for="post_graduate">Post Graduate and Above</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="others" name="education_level" <?php if (isset($_POST['education_level']) && $_POST['education_level']=="Others") echo "checked";?> value="Others">
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                    </div>
                    <span class="help-block" style="color:red">
                            <small id="education_err"><?php echo $education_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-5">
                <div class="form-group row">
                    <div class="col-sm-3">Status</div>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="single" name="marital_status" <?php if (isset($_POST['marital_status']) && $_POST['marital_status']=="Single") echo "checked";?> value="Single">
                            <label class="form-check-label" for="single">Single</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="married" name="marital_status" <?php if (isset($_POST['marital_status']) && $_POST['marital_status']=="Married") echo "checked";?> value="Married">
                            <label class="form-check-label" for="married">Married</label>
                        </div>
                    </div>
                </div>
                <span class="help-block" style="color:red">
                        <small id="marital_err"><?php echo $marital_err; ?></small>
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control mb-3" name="religion" id="religion" placeholder="Religion" value="<?php echo isset($_POST["religion"]) ? $_POST["religion"] : ''; ?>">
                <span class="help-block mb-3" style="color:red">
                        <small id="religion_err"><?php echo $religion_err; ?></small>
                </span>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group row">
                    <div class="col-sm-4">Caste</div>
                    <div class="col-sm-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sc" name="caste" <?php if (isset($_POST['caste']) && $_POST['caste']=="SC") echo "checked";?> value="SC">
                            <label class="form-check-label" for="sc">SC</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="st" name="caste" <?php if (isset($_POST['caste']) && $_POST['caste']=="ST") echo "checked";?> value="ST">
                            <label class="form-check-label" for="st">ST</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="obc" name="caste" <?php if (isset($_POST['caste']) && $_POST['caste']=="OBC") echo "checked";?> value="OBC">
                            <label class="form-check-label" for="obc">OBC</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="other_caste" name="caste" <?php if (isset($_POST['caste']) && $_POST['caste']=="Other") echo "checked";?> value="Other">
                            <label class="form-check-label" for="other_caste">Other</label>
                        </div>
                    </div>
                </div>
                <span class="help-block" style="color:red">
                        <small id="caste_err"><?php echo $caste_err; ?></small>
                </span>
            </div>
        </div>
        <input type="text" class="form-control mb-3" name="aadhar_no" id="aadhar_no" placeholder="Aadhar number" value="<?php echo isset($_POST["aadhar_no"]) ? $_POST["aadhar_no"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="aadhar_err"><?php echo $aadhar_err; ?></small>
        </span>
        <input type="number" name="dependants" id="dependants" class="form-control" placeholder="No of Dependents" value="<?php echo isset($_POST["dependants"]) ? $_POST["dependants"] : ''; ?>">
        <span class="help-block mb-3" style="color:red">
                <small id="dependants_err"><?php echo $dependants_err; ?></small>
        </span>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
