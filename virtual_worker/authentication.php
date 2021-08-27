<?php
    session_start();
    if(isset($_SESSION['user_id'])){
		header('location: view_applications/dashboard.php');
	}
    include "database.php";
    include "check_errors.php";
    $name_err = $employee_id_err = $remail_err = $lemail_err = $mobile_err = $branch_name_err = $district_err = $password_err = $confirm_password_err = "";
    $fields_array = array(
        array("name", "name_err", "Enter Name"),
        array("employee_id", "employee_id_err", "Enter Employee ID"),
        array("email", "remail_err", "Enter email"),
        array("mobile", "mobile_err", "Enter mobile number"),
        array("branch_name", "branch_name_err", "Enter Branch Name"),
        array("district", "district_err", "Enter District"),
        array("password", "password_err", "Enter Password"),
        array("confirm_password", "confirm_password_err", "Reenter Password")
    );
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['sign_up'])){
            $employee_id = trim($_POST['employee_id']);
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $mobile = trim($_POST['mobile']);
            $branch_name = trim($_POST['branch_name']);
            $district = trim($_POST['district']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            for($i=0; $i<count($fields_array); $i++){
                if(empty(${$fields_array[$i][0]})){
                    ${$fields_array[$i][1]} = $fields_array[$i][2];
                }else{
                    ${$fields_array[$i][1]} = '';
                }
            }
            $district = str_replace(' ', '', $district);

            if(!empty($email)){
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $remail_err = "Enter valid email";
                }else{
                    $remail_err = '';
                }
            }

            if(!empty($mobile)){
                $result = preg_match('/^[7-9][0-9]{9}$/', $mobile);
                if(!$result){
                    $mobile_err = "Enter valid mobile number";
                }else{
                    $mobile_err = '';
                }
            }

            if(!empty($password) && !empty($confirm_password)){
                if(strlen($password) < 8){
                    $password_err = "Password must have minimum 8 characters";
                }
                if(strlen($confirm_password) < 8){
                    $confirm_password_err = "Password must have minimum 8 characters";
                }
                if($password != $confirm_password){
                    $confirm_password_err = "Passwords do not match";
                }
            }

            $errors_array = array($name_err, $employee_id_err, $remail_err, $mobile_err, $branch_name_err, $district_err, $password_err, $confirm_password_err);
            if(isempty($errors_array) == 0){
                $password = md5($password);
                $sql = "SELECT * FROM $table_employees WHERE employee_id = '$employee_id' AND branch_name = '$branch_name' AND district = '$district'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $msg = '<div class="alert alert-danger" role="alert">
                                Employee id with same branch name and district is already registered.
                            </div>';
                }else{
                    $sql = "SELECT * FROM $table_employees WHERE email = '$email' OR mobile = '$mobile'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        $msg = '<div class="alert alert-danger" role="alert">
                                Email id or Mobile number already exists.
                            </div>';
                    }else{
                        $sql = "INSERT INTO $table_employees(employee_id, name, email, mobile, district, branch_name, password) VALUES('$employee_id', '$name', '$email', '$mobile', '$district', '$branch_name', '$password')";
                        $result = mysqli_query($con, $sql);
                        if($result){
                            $msg = '<div class="alert alert-success" role="alert">
                                Registeration Successful.
                            </div>';
                        }else{
                            $msg = '<div class="alert alert-danger" role="alert">'.
                                mysqli_error($con).
                            '</div>';
                        }

                    }
                }
            }
        }

        if(isset($_POST['login'])){
            $fields_array = array(
                array("email", "lemail_err", "Enter email"),
                array("password", "password_err", "Enter Password"),
            );

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            for($i=0; $i<count($fields_array); $i++){
                if(empty(${$fields_array[$i][0]})){
                    ${$fields_array[$i][1]} = $fields_array[$i][2];
                }else{
                    ${$fields_array[$i][1]} = '';
                }
            }

            if(!empty($email)){
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $lemail_err = "Enter valid email";
                }else{
                    $lemail_err = '';
                }
            }

            $errors_array = array($lemail_err, $password_err);
            if(isempty($errors_array) == 0){
                $password = md5($password);
                $sql = "SELECT * FROM $table_employees WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['district'] = $row['district'];
                    header('location: view_applications/dashboard.php');
                }else{
                    $msg = '<div class="alert alert-danger" role="alert">
                                Incorrect email or password.
                            </div>';
                }
            }

        }
    }
?>

<!DOCTYPE html>
<html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <title>Login</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
            <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <link rel="stylesheet" href="authentication_style.css?v=4">
            <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');</style>
        </head>
        <body class='snippet-body'>
        
        <?php echo isset($msg)?$msg:''; ?>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <div class="card border border-2">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a> </li>
                        <li class="nav-item text-center"> <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a> </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="form px-4 pt-5">
                                <form action="" method="POST">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="email_err"><?php echo $lemail_err; ?></small>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <input type="submit" class="btn btn-dark btn-block" name="login" value="Login">
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="form px-4"> 
                                <form action="" method="POST">
                                    <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="<?php echo isset($_POST["employee_id"]) ? $_POST["employee_id"] : ''; ?>">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="id_err"><?php echo $employee_id_err; ?></small>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="name_err"><?php echo $name_err; ?></small>
                                    </span>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"> 
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="email_err"><?php echo $remail_err; ?></small>
                                    </span>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>"> 
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="mobile_err"><?php echo $mobile_err; ?></small>
                                    </span>
                                    <input type="text" name="branch_name" class="form-control" placeholder="Branch Name" value="<?php echo isset($_POST["branch_name"]) ? $_POST["branch_name"] : ''; ?>">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="branch_err"><?php echo $branch_name_err; ?></small>
                                    </span>
                                    <input type="text" name="district" class="form-control" placeholder="District" value="<?php echo isset($_POST["district"]) ? $_POST["district"] : ''; ?>">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="district_err"><?php echo $district_err; ?></small>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="password_err"><?php echo $password_err; ?></small>
                                    </span>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                    <span class="help-block mb-3" style="color:red">
                                        <small id="confirm_password_err"><?php echo $confirm_password_err; ?></small>
                                    </span>
                                    <input type="submit" name="sign_up" class="btn btn-dark btn-block" value="SignUp"> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'></script>
        </body>
</html>


