<?php include "../database.php"; ?>
<?php include "../check_errors.php" ?>
<?php include "../config.php"?>
<?php
    $age_err = $income_err = "";
    $fname_err = $mname_err = $lname_err = $card_name_err = $dependants_err = $mobile_err = $passport_err = $pan_err = $nationality_err = $dob_err = $gender_err = $alt_mobile_err = "";
    $address_err = $pincode_err  = $district_err = $city_err = $state_err = $residence_type_err = $stay_period_err = $vehicle_err = $vehicle_make_err = $vehicle_year_err = "";
    $company_name_err = $company_address_err = $company_pincode_err = $company_city_err = $company_state_err = $designation_err = $gross_income_err = $gross_expense_err = $occupation_type_err = "";
    $customer_type_err = $existing_no_err = $customer_no_err = "";
    $dob_proof_err = $identification_proof_err = $income_proof_err = "";
    
    $target_dir = $credit_card_proofs_dir;
    $extensions_arr = array("jpg","jpeg","png");
    $fields_array = array(
        array("fname", "fname_err", "Enter First name"),
        array("lname", "lname_err", "Enter Last name"),
        array("card_name", "card_name_err", "Enter card name"),
        array("gender", "gender_err", "Select your gender"),
        array("nationality", "nationality_err", "Select your nationality"),
        array("address", "address_err", "Enter your address"),
        array("pincode", "pincode_err", "Enter your pincode"),
        array("district", "district_err", "Enter your district"),
        array("city", "city_err", "Enter your city"),
        array("state", "state_err", "Enter your state"),
        array("residence_type", "residence_type_err", "Select your residence type"),
        array("stay_period", "stay_period_err", "Enter the Time period living at current Residence"),
        array("vehicle_type", "vehicle_err", "Select the vehicle type"),
        array("company_name", "company_name_err", "Enter your Company name"),
        array("company_address", "company_address_err", "Enter the Company address"),
        array("company_pincode", "company_pincode_err", "Enter the Company location's pincode"),
        array("company_city", "company_city_err", "Enter the Company location's city"),
        array("company_state", "company_state_err", "Enter Company location's state"),
        array("designation", "designation_err", "Enter your Designation"),
        array("occupation_type", "occupation_type_err", "Select your occupation type"),
        array("customer_type", "customer_type_err", "Select the customer type")
    );
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $age = $_POST['age'];
        $income = $_POST['income'];
        $fname = trim($_POST['fname']);
        $mname = trim($_POST['mname']);
        $lname = trim($_POST['lname']);

        $target_dir .= $fname.$lname.uniqid()."/";
        mkdir($target_dir);
        $card_name = trim($_POST['card_name']);
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $dob = trim($_POST['dob']);
        $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
        $pan = trim($_POST['pan']);
        $passport = trim($_POST['passport']);
        $mobile = trim($_POST['mobile']);
        $alt_mobile = trim($_POST['alt_mobile']);
        $dependants = trim($_POST['dependants']);
        $address = trim($_POST['curr_address']);
        $pincode = trim($_POST['pincode']);
        $district = trim($_POST['district']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $residence_type = isset($_POST['residence_type']) ? $_POST['residence_type'] : '';
        $stay_period = trim($_POST['stay_period']);
        $vehicle_type = isset($_POST['vehicle_type']) ? $_POST['vehicle_type'] : '';
        $vehicle_make = trim($_POST['vehicle_make']);
        $vehicle_year = trim($_POST['vehicle_year']);
        $company_name = trim($_POST['company_name']);
        $company_address = trim($_POST['company_address']);
        $company_pincode = trim($_POST['company_pincode']);
        $company_city = trim($_POST['company_city']);
        $company_state = trim($_POST['company_state']);
        $designation = trim($_POST['designation']);
        $gross_income = trim($_POST['gross_income']);
        $gross_expense = trim($_POST['gross_expense']);
        $occupation_type = isset($_POST['occupation_type']) ? $_POST['occupation_type'] : '';
        $customer_type = isset($_POST['customer_type']) ? $_POST['customer_type'] : '';
        $existing_no = trim($_POST['existing_no']);
        $customer_no = $_POST['customer_no'];
        $identification_no = '';
        $dob_proof_name = $_FILES['dob_proof']['name'];
        $identification_proof_name = $_FILES['identification_proof']['name'];
        $income_proof_name = $_FILES['income_proof']['name'];
        $dob_proof_file = $identification_proof_file = $income_proof_file = '';
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

        $district = str_replace(" ", "", $district);

        if(empty($age)){
            $age_err = 'Enter your age';
        }else{
            if((int)$age < 18){
                $age_err = 'People with age below 18 are not eligible.';
            }else{
                $age_err = '';
            }
        }

        if(empty($income)){
            $income_err = 'Enter your income';
        }else{
            if((int)$income < 20000){
                $income_err = 'Minimum income of 20,000 is eligible for credit card';
            }else{
                $income_err = '';
            }
        }

        if(empty($dob)){
            $dob_err = "Select your DOB";
        }else{
            $age = date("Y") - (int)substr($dob, 0, 4);
            if($age < 18){
                $dob_err = "Not eligible if below 18";
            }else{
                $dob_err = '';
            }
        }
        if(empty($nationality)){
            $nationality_err = "Select your nationality";
        }else{
            if($nationality == "Indian"){
                if(empty($pan)){
                    $pan_err = "Enter your PAN number";
                }else{
                    $pan_err = '';
                    $identification_no = $pan;
                }
            }
            if($nationality == "Foreign"){
                if(empty($passport)){
                    $passport_err = "Enter your Passport number";
                }else{
                    $passport_err = '';
                    $identification_no = $passport;
                }
            }
        }
        if(empty($mobile)){
            $mobile_err = "Enter your mobile number";
        }else{
            $result = preg_match('/^[7-9][0-9]{9}$/', $mobile);
            if(!$result){
                $mobile_err = "Enter valid mobile number";
            }else{
                $mobile_err = '';
            }
        }
        if(!empty($alt_mobile)){
            $result = preg_match('/^[7-9][0-9]{9}$/', $alt_mobile);
            if(!$result){
                $alt_mobile_err = "Enter valid mobile number";
            }else{
                $alt_mobile_err = '';
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
        if(!empty($pincode)){
            $result = preg_match('/^[0-9]{6}$/', $pincode);
            if(!$result){
                $pincode_err = 'Enter a valid pincode';
            }else{
                $pincode_err = '';
            }
        }
        if(!empty($stay_period)){
            $result = preg_match('/^[12][0-9]{3}$/', $stay_period);
            $current_year = date('Y');
            if(!$result || ((int)$stay_period > (int)$current_year)){
                $stay_period_err = 'Enter a valid year';
            }else{
                $stay_period_err = '';
            }
        }
        if(empty($vehicle_type)){
            $vehicle_type = "Select the type of vehicle";
        }else{
            if($vehicle_type == 'other'){
                if(empty($vehicle_make)){
                    $vehicle_make_err = "Enter the type of vehicle";
                }else{
                    $vehicle_make_err = '';
                    $vehicle_type = $vehicle_make;
                }
            }
        }
        if($vehicle_type != "none"){
            if(empty($vehicle_year)){
                $vehicle_year_err = "Select the year";
            }else{
                $result = preg_match('/^[12][0-9]{3}$/', $vehicle_year);
                $current_year = date('Y');
                if(!$result || ((int)$vehicle_year > (int)$current_year)){
                    $vehicle_year_err = 'Enter a valid year';
                }else{
                    $vehicle_year_err = '';
                }
            }
        }
        if(empty($gross_income)){
            $gross_income_err = "Enter your gross monthly income";
        }else {
            $result = preg_match('/^[0-9]*$/', $gross_income);
            if(!$result){
                $gross_income_err = "Enter valid gross monthly income";
            }else{
                if((int)$gross_income < 20000){
                    $gross_income_err = "Minimum income of 20000 is eleigible for credit card";
                }else{
                    $gross_income_err = '';
                }
            }
        }
        if(empty($gross_expense)){
            $gross_expense_err = "Enter your gross expense";
        }else {
            $result = preg_match('/^[0-9]+$/', $gross_income);
            if(!$result){
                $gross_expense_err = "Enter valid gross expense";
            }else{
                $gross_expense_err = '';
            }
        }
        if(!empty($company_pincode)){
            $result = preg_match('/^[0-9]{6}$/', $company_pincode);
            if(!$result){
                $company_pincode_err = 'Enter a valid pincode';
            }else{
                $company_pincode_err = '';
            }
        }

        if($customer_type === 'Existing'){
            if(empty($existing_no)){
                $existing_no_err = 'Enter your Loan/Account number';
            }else{
                $existing_no_err = '';
            }
            if(empty($customer_no)){
                $customer_no_err = 'Enter your Customer ID number';
            }else{
                $customer_no_err = '';
            }
        }

        if(empty($dob_proof_name)){
            $dob_proof_err = "Upload an image for the Date of Birth Proof";
        }else{
            $dob_proof_file = $target_dir.basename($_FILES['dob_proof']['name']);
            $file_type = strtolower(pathinfo($dob_proof_name,PATHINFO_EXTENSION));
            if(!in_array($file_type, $extensions_arr)){
                $dob_proof_err = 'Upload a jpg or jpeg or png file';
            }else{
                $dob_proof_err = '';
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
            $income_proof_err = "Upload an image of the income slip";
        }else{
            $income_proof_file = $target_dir.basename($_FILES['income_proof']['name']);
            $file_type = strtolower(pathinfo($income_proof_name,PATHINFO_EXTENSION));
            if(!in_array($file_type, $extensions_arr)){
                $income_proof_err = 'Upload a jpg or jpeg or png file';
            }else{
                $income_proof_err = '';
            }
        }
        
        $errors_array = array($age_err, $income_err, $fname_err , $mname_err, $lname_err, $card_name_err , $dependants_err, $mobile_err, $passport_err, $pan_err, $nationality_err, $dob_err, $gender_err, $alt_mobile_err, $address_err, $pincode_err, $district_err, $city_err , $state_err, $residence_type_err, $stay_period_err, $vehicle_err, $vehicle_make_err, $vehicle_year_err, $company_name_err, $company_address_err, $company_pincode_err, $company_city_err, $company_state_err, $designation_err, $gross_income_err,  $gross_expense_err, $occupation_type_err, $customer_type_err, $existing_no_err, $customer_no_err, $dob_proof_err, $identification_proof_err, $income_proof_err);
        if(isempty($errors_array) == 0){
            if(move_uploaded_file($_FILES['dob_proof']['tmp_name'],$dob_proof_file) && move_uploaded_file($_FILES['identification_proof']['tmp_name'],$identification_proof_file) && move_uploaded_file($_FILES['income_proof']['tmp_name'],$income_proof_file)){
                $sql = "INSERT INTO $table_credit_card_applications(customer_type, customer_id, f_name, m_name, l_name, card_name, gender, dob, nationality, identification_no, mobile_no, alt_mobile_no, no_dependents, address, pincode, district, city, state, residence_type, stay_period, vehicle_type, vehicle_purchase, company_name, designation, company_address, company_pincode, company_city, company_state, monthly_income, monthly_expense, occupation_type, account_no, dob_proof, identification_proof, income_proof, signature_proof, token_number)
                VALUES('$customer_type', '$customer_no', '$fname', '$mname', '$lname', '$card_name', '$gender', '$dob', '$nationality', '$identification_no', '$mobile', '$alt_mobile', '$dependants', '$address', '$pincode',  '$district','$city', '$state', '$residence_type', '$stay_period', '$vehicle_type', '$vehicle_year', '$company_name', '$designation', '$company_address', '$company_pincode', '$company_city', '$company_state', '$gross_income', '$gross_expense', '$occupation_type', '$existing_no', '$dob_proof_file', '$identification_proof_file', '$income_proof_file', '$signatureFileName', '$token_number')";
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
        <title>Credit Card Application</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
        <script src="https://kit.fontawesome.com/0d2df49e16.js" crossorigin="anonymous"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

        <link rel="stylesheet" href="form_style.css?v=2">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script> -->

        <script type="text/javascript" src="script.js?v=4"></script>
    </head>
    <body>
        <?php echo isset($msg)?$msg:''; ?>
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="text-center w-75">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Credit Card Application</strong></h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
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
                                        include 'address_info.php';
                                        include 'occupation_info.php';
                                        include 'bank_relationship.php';
                                        include 'files_upload.php';
                                        include 'signature.php';
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
    </body>
</html>
