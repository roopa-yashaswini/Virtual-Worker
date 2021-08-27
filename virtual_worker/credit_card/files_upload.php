<fieldset>
    <div class="form-card">
        <h2 class="fs-title text-center">Files Upload</h2> <br><br>
        <div class="form-row">
            <label for="dob_proof" class="form-label">DOB Proof</label>
            <input type="file" class="form-control" name="dob_proof" id="dob_proof"  required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>

        <div class="from-row">
            <label for="identification_proof" class="form-label" id="identification_label">Identification Proof</label>
            <input type="file" class="form-control" name="identification_proof" id="identification_proof" required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>

        <div class="form-row">
            <label for="income_proof" class="form-label">Income Proof</label>
            <input type="file" class="form-control" name="income_proof" id="income_proof" required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" class="next action-button" name="next" value="Next" />
</fieldset>
