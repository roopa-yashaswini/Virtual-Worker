<?php include "../database.php"; ?>
<?php include "../config.php"?>
<?php include "../check_errors.php" ?>
<?php
    $age_err = $income_err = '';
    $fname_err = $mname_err = $lname_err = $guardian_err = $gender_err = $dob_err = $nationality_err = $marital_err = $caste_err = $pan_err  = $aadhar_err = $education_err = $dependants_err  = $religion_err = "" ;
    $curr_address_err = $curr_city_err = $curr_pincode_err = $curr_district_err =  $curr_state_err  = $curr_country_err = $perm_address_err = $perm_district_err = $perm_city_err = $perm_pincode_err = $perm_state_err  = $perm_country_err = $permanent_address_check = $residence_type_err = $stay_period_err = $mobile_err = $alt_mobile_err = $email_err = "";
    $occupation_type_err = $salaried_err = $company_name_err = $company_address_err = $company_pincode_err = $company_city_err = $company_state_err = $designation_err = $gross_income_err = "";
    $customer_type_err = $customer_no_err = $loan_tenure_err = $loan_amount_err = '';
    $photo_proof_err = $dob_proof_err = $identification_proof_err = $income_proof_err = "";
    $permanent_address_check_err = '';

    $target_dir = $personal_loan_proofs_dir;

    $extensions_arr = array("jpg","jpeg","png");
    $fields_array = array(
        array("fname", "fname_err", "Enter First name"),
        array("lname", "lname_err", "Enter Last name"),
        array("guardian_name", "guardian_err", "Enter your Father's/Husband's name"),
        array("gender", "gender_err", "Select your gender"),
        array("nationality", "nationality_err", "Enter your nationality"),
        array('pan', 'pan_err', 'Enter your PAN number'),
        array("education_status", "education_err", "Select the education status"),
        array("marital_status", "marital_err", "Select the marital status"),
        array("caste", "caste_err", "Select the caste"),
        array('religion', 'religion_err', 'Enter your religion'),
        array('aadhar_no', 'aadhar_err', 'Enter your aadhar number'),
        array("current_address", "current_address_err", "Enter your address"),
        array("current_pincode", "current_pincode_err", "Enter your pincode"),
        array("current_district", "current_district_err", "Enter your district"),
        array("current_city", "current_city_err", "Enter your city"),
        array("current_state", "current_state_err", "Enter your state"),
        array("current_country", "current_country_err", "Enter your country"),
        array("permanent_address_check", "permanent_address_check_err", "Select a value"),
        array("perm_address", "perm_address_err", "Enter your address"),
        array("perm_pincode", "perm_pincode_err", "Enter your pincode"),
        array("perm_district", "perm_district_err", "Enter your district"),
        array("perm_city", "perm_city_err", "Enter your city"),
        array("perm_state", "perm_state_err", "Enter your state"),
        array("perm_country", "perm_country_err", "Enter your country"),
        array("residence_type", "residence_type_err", "Select your residence type"),
        array("stay_period", "stay_period_err", "Enter the Time period living at current Residence"),
        array("occupation_type", "occupation_type_err", "Select your occupation"),
        array("customer_type", "customer_type_err", "Select the customer type"),
        array("loan_amount", "loan_amount_err", "Enter the loan amount"),
        array("loan_tenure", "loan_tenure_err", "Enter the loan tenure")
    );
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $age = $_POST['age'];
        $income = $_POST['income'];
        $fname = trim($_POST['fname']);
        $mname = trim($_POST['mname']);
        $lname = trim($_POST['lname']);

        $target_dir .= $fname.$lname.uniqid()."/";
        mkdir($target_dir);

        $guardian_name = trim($_POST['guardian_name']);
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $dob = trim($_POST['dob']);
        $nationality = trim($_POST['nationality']);
        $pan = trim($_POST['pan']);
        $aadhar_no = trim($_POST['aadhar_no']);
        $education_status = isset($_POST['education_level']) ? $_POST['education_level'] : '';
        $marital_status = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
        $religion = trim($_POST['religion']);
        $caste = isset($_POST['caste']) ? $_POST['caste'] : '';
        $dependants = $_POST['dependants'];

        $current_address = trim($_POST['curr_address']);
        $current_pincode = trim($_POST['curr_pincode']);
        $current_district = trim($_POST['curr_district']);
        $current_city = trim($_POST['curr_city']);
        $current_state = trim($_POST['curr_state']);
        $current_country = trim($_POST['curr_country']);
        $permanent_address_check = isset($_POST['permanent_address_check']) ? $_POST['permanent_address_check'] : '';
        $perm_address = $permanent_address_check === 'T' ? $current_address : trim($_POST['perm_address']);
        $perm_pincode = $permanent_address_check === 'T' ? $current_pincode : trim($_POST['perm_pincode']);
        $perm_district = $permanent_address_check === 'T' ? $current_district : trim($_POST['perm_district']);
        $perm_city = $permanent_address_check === 'T' ? $current_city : trim($_POST['perm_city']);
        $perm_state = $permanent_address_check === 'T' ? $current_state :trim( $_POST['perm_state']);
        $perm_country = $permanent_address_check === 'T' ? $current_country : trim($_POST['perm_country']);
        $residence_type = isset($_POST['residence_type']) ? $_POST['residence_type'] : '';
        $stay_period = trim($_POST['stay_period']);
        $mobile_no = trim($_POST['mobile']);
        $alt_mobile_no = trim($_POST['alt_mobile']);
        $email = trim($_POST['email']);

        $occupation_type = isset($_POST['occupation_type']) ? $_POST['occupation_type'] : '';
        $occupation_other_type = trim($_POST['occupation_other_type']);
        $salaried_type = isset($_POST['salaried_type']) ? $_POST['salaried_type'] : '';
        $designation = trim($_POST['designation']);
        $company_name = trim($_POST['company_name']);
        $company_address = trim($_POST['company_address']);
        $company_pincode = trim($_POST['company_pincode']);
        $company_city = trim($_POST['company_city']);
        $company_state = trim($_POST['company_state']);
        $income = $_POST['gross_income'];

        $customer_type = isset($_POST['customer_type']) ? $_POST['customer_type'] : '';
        $customer_no = $_POST['customer_no'];
        $other_acc_no = $_POST['other_acc_no'];
        $other_acc_bank = $_POST['other_acc_bank'];
        $loan_amount = $_POST['loan_amount'];
        $loan_tenure = $_POST['loan_tenure'];

        $photo_proof_name = $_FILES['photo_proof']['name'];
        $identification_proof_name = $_FILES['identification_proof']['name'];
        $income_proof_name = $_FILES['income_proof']['name'];
        $photo_proof_file = $dob_proof_file = $identification_proof_file = $income_proof_file = '';
        $signature = $_POST['signature'];
        $signatureFileName = $target_dir.uniqid().'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = $signatureFileName;
        $token_number = generate_token();

        for($i=0; $i<count($fields_array); $i++){
            if(empty(${$fields_array[$i][0]})){
                ${$fields_array[$i][1]} = $fields_array[$i][2];
            }else{
                ${$fields_array[$i][1]} = '';
            }
        }

        if(empty($age)){
            $age_err = 'Enter your age';
        }else{
            if((int)$age < 21 || (int)$age > 60){
                $age_err = 'Eligible age is between 21 and 60';
            }else{
                $age_err = '';
            }
        }

        if(empty($income)){
            $income_err = 'Enter your income';
        }else{
            if((int)$income < 25000){
                $income_err = 'Minimum income of 25,000 is eligible for personal loan';
            }else{
                $income_err = '';
            }
        }

        if(empty($dob)){
            $dob_err = "Select your DOB";
        }else{
            $age = date("Y") - (int)substr($dob, 0, 4);
            if($age < 21 || $age > 60){
                $dob_err = "Not eligible for a Personal Loan";
            }else{
                $dob_err = '';
            }
        }

        if(empty($pan)){
            $pan_err = "Enter your PAN Number";
        }else{
            $result = preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pan);
            if(!$result){
                $pan_err = "Enter a valid PAN Number";
            }else{
                $pan_err = '';
            }
        }

        if(!empty($aadhar_no)){
            $result = preg_match('/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/', $aadhar_no);
            if(!$result){
                $aadhar_err = 'Enter a valid AADHAR number';
            }else{
                $aadhar_err = '';
            }
        }

        if(!empty($dependants) || $dependants == 0){
            $result = preg_match('/^[0-9]+$/', $dependants);
            if(!$result){
                $dependants_err = 'Enter valid number of dependants';
            }else{
                $dependants_err = '';
            }
        }else{
            $dependants_err = 'Enter the number of dependants';
        }

        //communication_info check

        if(!empty($stay_period)){
            $result = preg_match('/^[12][0-9]{3}$/', $stay_period);
            $current_year = date('Y');
            if(!$result || ((int)$stay_period > (int)$current_year)){
                $stay_period_err = 'Enter a valid year';
            }else{
                $stay_period_err = '';
            }
        }

        if(empty($mobile_no)){
            $mobile_err = "Enter your mobile number";
        }else{
            $result = preg_match('/^[7-9][0-9]{9}$/', $mobile_no);
            if(!$result){
                $mobile_err = "Enter valid mobile number";
            }else{
                $mobile_err = '';
            }
        }

        if(!empty($alt_mobile_no)){
            $result = preg_match('/^[7-9][0-9]{9}$/', $alt_mobile_no);
            if(!$result){
                $alt_mobile_err = "Enter valid mobile number";
            }else{
                $alt_mobile_err = '';
            }
        }

        if(!empty($email)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_err = "Enter valid email";
            }else{
                $email_err = '';
            }
        }

        if($occupation_type === 'Other'){
            if(empty($occupation_other_type)){
                $occupation_type_err = 'Enter your occupation';
            }else{
                $occupation_type = $occupation_other_type;
            }
        }

        if($occupation_type === 'Salaried' || $occupation_type === 'Self Employed'){
            if(empty($salaried_type)){
                $salaried_err = 'Select your industry type';
            }else{
                $salaried_err = '';
            }
        }
        if($occupation_type === 'Salaried' || $occupation_type === 'Self Employed' || $occupation_type === 'Other'){
            if(empty($company_name)){
                $company_name_err = 'Enter your company name';
            }else{
                $company_name_err = '';
            }
            if(empty($company_address)){
                $company_address_err = 'Enter your company address';
            }else{
                $company_address_err = '';
            }
            if(empty($designation)){
                $designation_err = 'Enter your designation';
            }else{
                $designation_err = '';
            }
            if(empty($company_pincode)){
                $company_pincode_err = 'Enter the company pincode';
            }else{
                $company_pincode_err = '';
            }
            if(empty($company_city)){
                $company_city_err = 'Enter the company city';
            }else{
                $company_city_err = '';
            }
            if(empty($company_state)){
                $company_state_err = 'Enter the company state';
            }else{
                $company_state_err = '';
            }
        }

        if($occupation_type === 'Salaried' || $occupation_type === 'Self Employed' || $occupation_type === 'Other' || $occupation_type === 'Retired'){
            if(empty($income)){
                $gross_income_err = 'Enter your income';
            }else{
                $result = preg_match('/\d+/', $income);
                if(!$result){
                    $gross_income_err = 'Enter valid income';
                }else{
                    $gross_income_err = '';
                }
            }
        }

        if($customer_type === 'Existing'){
            if(empty($customer_no)){
                $customer_no_err = 'Enter your Customer ID no';
            }else{
                $customer_no_err = '';
            }
        }

        if(!empty($loan_amount)){
            $result = preg_match('/^\d+$/', $loan_amount);
            if(!$result){
                $loan_amount_err = 'Enter a valid amount';
            }else{
                $loan_amount_err = '';
            }
        }

        if(!empty($loan_tenure)){
            $result = preg_match('/^\d+$/', $loan_tenure);
            if(!$result){
                $loan_tenure_err = 'Enter a valid tenure';
            }else{
                $loan_tenure_err = '';
            }
        }

        if(empty($photo_proof_name)){
            $photo_proof_err = "Upload an image of passport size Photo";
        }else{
            $photo_proof_file = $target_dir.basename($_FILES['photo_proof']['name']);
            $file_type = strtolower(pathinfo($photo_proof_name,PATHINFO_EXTENSION));
            if(!in_array($file_type, $extensions_arr)){
                $photo_proof_err = 'Upload a jpg or jpeg or png file';
            }else{
                $photo_proof_err = '';
            }
        }

        if(empty($identification_proof_name)){
            $identification_proof_err = "Upload an image of PAN card or Passport";
        }else{
            $identification_proof_file = $target_dir.basename($_FILES['identification_proof']['name']);
            $file_type = strtolower(pathinfo($identification_proof_name,PATHINFO_EXTENSION));
            if(!in_array($file_type, $extensions_arr)){
                $identification_proof_err = 'Upload a jpg or jpeg or png file';
            }else{
                $identification_proof_err = '';
            }
        }

        if(empty($income_proof_name)){
            if($occupation_type === 'Salaried' || $occupation_type === 'Self Employed' || $occupation_type === 'Other'){
                $income_proof_err = "Upload an image of the income slip";
            }else{
                $income_proof_err = '';
            }
        }else{
            $income_proof_file = $target_dir.basename($_FILES['income_proof']['name']);
            $file_type = strtolower(pathinfo($income_proof_name,PATHINFO_EXTENSION));
            if(!in_array($file_type, $extensions_arr)){
                $income_proof_err = 'Upload a jpg or jpeg or png file';
            }else{
                $income_proof_err = '';
            }
        }
        $errors_array = array($fname_err, $mname_err, $lname_err, $guardian_err, $gender_err, $dob_err, $nationality_err, $marital_err, $caste_err, $pan_err, $aadhar_err, $education_err, $dependants_err, $religion_err, $curr_address_err, $curr_pincode_err, $curr_district_err, $curr_city_err, $curr_state_err, $curr_country_err, $perm_address_err, $perm_pincode_err, $perm_district_err, $perm_city_err, $perm_state_err, $perm_country_err, $permanent_address_check_err, $residence_type_err, $stay_period_err, $mobile_err, $alt_mobile_err, $email_err, $occupation_type_err, $salaried_err, $company_name_err, $company_address_err, $company_address_err, $company_pincode_err, $company_city_err, $company_state_err, $designation_err, $gross_income_err, $customer_type_err, $customer_no_err, $loan_tenure_err, $loan_amount_err, $photo_proof_err, $dob_proof_err, $identification_proof_err, $income_proof_err);
        if(isempty($errors_array) == 0){
            if(move_uploaded_file($_FILES['photo_proof']['tmp_name'],$photo_proof_file) && move_uploaded_file($_FILES['identification_proof']['tmp_name'],$identification_proof_file) && move_uploaded_file($_FILES['income_proof']['tmp_name'],$income_proof_file)){
                $sql = "INSERT INTO $table_loan_applications(f_name, m_name, l_name, guardian_name, gender, dob, nationality, pan_no, education_status, marital_status, religion, caste, aadhar_no, dependants, current_address, current_pincode, current_district, current_city, current_state, current_country, permanent_address, permanent_pincode, permanent_district, permanent_city, permanent_state, permanent_country, residence_type, stay_period, mobile_no, alt_mobile_no, email, occupation_type, salaried_type, company_name, designation, company_address, company_pincode, company_city, company_state, monthly_income, customer_type, customer_id, other_acc_no, ather_bank_name, loan_amount, loan_tenure, photo_proof, identification_proof, income_proof, signature_proof, token_number)
                VALUES ('$fname', '$mname', '$lname', '$guardian_name', '$gender', '$dob', '$nationality', '$pan', '$education_status', '$marital_status', '$religion', '$caste', '$aadhar_no', '$dependants', '$current_address', '$current_pincode', '$current_district', '$current_city', '$current_state', '$current_country', '$perm_address', '$perm_pincode', '$perm_district', '$perm_city', '$perm_state', '$perm_country', '$residence_type', '$stay_period', '$mobile_no', '$alt_mobile_no', '$email', '$occupation_type', '$salaried_type', '$company_name', '$designation', '$company_address', '$company_pincode', '$company_city', '$company_state', '$income', '$customer_type', '$customer_no', '$other_acc_no', '$other_acc_bank', '$loan_amount', '$loan_tenure', '$photo_proof_file', '$identification_proof_file', '$income_proof_file', '$signatureFileName', '$token_number')";
                if(!mysqli_query($con, $sql)){
                    $msg = '<div class="alert alert-danger" role="alert">
                            Error inserting data'.mysqli_error($con).'
                            </div>';
                    emptyDir($target_dir);
                    rmdir($target_dir);
                }else{
                    file_put_contents($file, $data);
                    $msg = '<div class="alert alert-success" role="alert">
                    Application Submitted.
                  </div>';
                  session_start();
                  $_SESSION['token_no'] = $token_number;
                  header('location: ../display_token.php');
                  //header('location: ../index.php');
                }
            }
        }else{
            $msg = '<div class="alert alert-danger" role="alert">
                    Errors present. Please correct them and resubmit the application.
                </div>';
            emptyDir($target_dir);
            rmdir($target_dir);
        }

    }
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Personal Loan Application</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/0d2df49e16.js" crossorigin="anonymous"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
        <link rel="stylesheet" href="form_style.css?v=3">
        <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type="text/javascript" src="script.js?v=3"></script>
        <style media="screen">
            .not-active{
                display: none;
            }
        </style>
    </head>
    <body>
    <?php echo isset($msg)?$msg:''; ?>
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="text-center w-75">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Sign Up Your User Account</strong></h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="account_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>Account</strong></li>
                                        <li id="personal"><strong>Personal Details</strong></li>
                                        <li id="address"><strong>Address Details</strong></li>
                                        <li id="occupation"><strong>Occupation Details</strong></li>
                                        <li id="bank"><strong>Bank Relationship</strong></li>
                                        <li id="files"><strong>Files</strong></li>
                                        <li id="signature_block"><strong>Signature</strong></li>
                                    </ul>
                                    <!-- fieldsets -->
                                    <?php
                                        include 'eligibility.php';
                                        include 'personal_info.php';
                                        include 'communication_info.php';
                                        include 'occupation_info.php';
                                        include 'bank_relationship.php';
                                        include 'files_upload.php';
                                        include "signature.php";
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
