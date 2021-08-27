<fieldset>
    <div class="form-card">
        <h2 class="fs-title">Account Information</h2>
        <div class="container text-center" id="account_type_block">
            <h5>Account Type</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="savings" value="Savings">
                <label class="form-check-label" for="savings">Savings</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="savings_max" value="Savings Max">
                <label class="form-check-label" for="savings_max">Savings Max</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="savings_salary" value="Savings Salary">
                <label class="form-check-label" for="savings_salary">Savings Salary</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="current" value="Current">
                <label class="form-check-label" for="current">Current</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="kids" value="Kids Advantage">
                <label class="form-check-label" for="kids">Kids Advantage</label>
            </div>
        </div>
        <span class="help-block  mb-3" style="color:red">
                <small id="type_err"><?php echo $account_type_err ?></small>
        </span>

        <div class="container text-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_sub_type" id="fd" value="FD">
                <label class="form-check-label" for="fd">FD</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_sub_type" id="rd" value="RD">
                <label class="form-check-label" for="rd">RD</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_sub_type" id="ppf" value="PPF A/C">
                <label class="form-check-label" for="ppf">PPF A/C</label>
            </div>

        </div>
        <span class="help-block  mb-3" style="color:red">
                <small id="sub_type_err"><?php echo $account_sub_type_err ?></small>
        </span>
    </div>
    <input type="button" name="next" id="next_main" class="action-button" value="Next Step" />
</fieldset>
