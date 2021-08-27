<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Account Information</h2>
        <input type="text" name="age" id="age" placeholder="Age" class="form-control mb-3"/>
        <span class="help-block  mb-3" style="color:red">
                <small id="age_err"><?php echo $age_err; ?></small>
        </span>
        <input type="text" name="income" id="income" placeholder="Monthly Income" class="form-control  mb-3"/>
        <span class="help-block  mb-3" style="color:red">
                <small id="income_err"><?php echo $income_err; ?></small>
        </span>
    </div>
    <input type="button" name="next" id="next" class="next action-button" value="Next Step" disabled />
</fieldset>