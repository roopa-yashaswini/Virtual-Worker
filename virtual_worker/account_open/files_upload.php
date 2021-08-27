<fieldset>
    <div class="form-card">
        <h2 class="fs-title text-center">Files Upload</h2> <br><br>

        <div class="form-row mb-3">
            <label for="photo_proof" class="form-label">Passport Size Photo</label>
            <input type="file" class="form-control" name="photo_proof" id="photo_proof"  required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>

        <div class="form-row mb-3">
            <label for="dob_proof" class="form-label">DOB Proof</label>
            <input type="file" class="form-control" name="dob_proof" id="dob_proof"  required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>

        <div class="form-row mb-3">
            <label for="identification_proof" class="form-label" id="identification_label">PAN Card/Aadhar Proof</label>
            <input type="file" class="form-control" name="identification_proof" id="identification_proof" required>
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>

        <div class="form-row mb-3" id="income_proof_block">
            <label for="income_proof" class="form-label">Income Proof</label>
            <input type="file" class="form-control" name="income_proof" id="income_proof">
            <div class="form-text">
                Upload an image of jpg, jpeg, or png extension
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="submit" class="next action-button" name="submit" value="Submit" />
</fieldset>
