<?php include "header.php" ?>
<?php include "../check_errors.php" ?>
<?php
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM $table_employees WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

?>
<?php
    $name_err = $employee_id_err = $mobile_err = $branch_name_err = $district_err = "";
    $fields_array = array(
        array("name", "name_err", "Enter Name"),
        array("employee_id", "employee_id_err", "Enter Employee ID"),
        array("mobile", "mobile_err", "Enter mobile number"),
        array("branch_name", "branch_name_err", "Enter Branch Name"),
        array("district", "district_err", "Enter District")
    );
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['update_profile'])){
            $id = $_SESSION['user_id'];
            $employee_id = trim($_POST['employee_id']);
            $name = trim($_POST['name']);
            $mobile = trim($_POST['mobile']);
            $branch_name = trim($_POST['branch_name']);
            $district = trim($_POST['district']);

            for($i=0; $i<count($fields_array); $i++){
                if(empty(${$fields_array[$i][0]})){
                    ${$fields_array[$i][1]} = $fields_array[$i][2];
                }else{
                    ${$fields_array[$i][1]} = '';
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

            $errors_array = array($name_err, $employee_id_err, $mobile_err, $branch_name_err, $district_err);
            if(isempty($errors_array) == 0){
                $sql = "SELECT * FROM $table_employees WHERE employee_id = '$employee_id' AND branch_name = '$branch_name' AND district = '$district' AND id != '$id'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $msg = '<div class="alert alert-danger" role="alert">
                                Employee id with same branch name and district is already registered.
                            </div>';
                    
                }else{
                    $sql = "SELECT * FROM $table_employees WHERE mobile = '$mobile' AND id != '$id'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        $msg = '<div class="alert alert-danger" role="alert">
                                Mobile number already exists.
                            </div>';
                    }else{
                        $sql = "UPDATE $table_employees SET employee_id = '$employee_id', name = '$name', mobile = '$mobile', branch_name = '$branch_name', district = '$district' WHERE id = '$id'";
                        $result = mysqli_query($con, $sql);
                        if($result){
                            $msg = '<div class="alert alert-success" role="alert">
                                Profile Updated.
                            </div>';
                            $_SESSION['name'] = $name;
                            $_SESSION['district'] = $district;
                        }else{
                            $msg = '<div class="alert alert-danger" role="alert">'.
                                mysqli_error($con).
                            '</div>';
                        }
                    }
                }
            }else{
                $msg = '<div class="alert alert-danger" role="alert"> Errors Present'.
                            '</div>';
            }
        }
    }


?>
<div class="col-9 my-lg-0 my-1">
    <div id="main-content" class="bg-white border">
    <?php echo isset($msg)?$msg:''; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="mb-3 row">
                <label for="employee_id" class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-10">
                    <input type="text" name="employee_id" class="form-control" id="employee_id" value="<?php echo $row['employee_id'] ?>">
                    <span class="help-block mb-3" style="color:red">
                        <small id="id_err"><?php echo $employee_id_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'] ?>">
                    <span class="help-block mb-3" style="color:red">
                        <small id="name_err"><?php echo $name_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $row['mobile'] ?>">
                    <span class="help-block mb-3" style="color:red">
                        <small id="mobile_err"><?php echo $mobile_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="district" class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-10">
                    <input type="text" name="district" class="form-control" id="district" value="<?php echo $row['district'] ?>">
                    <span class="help-block mb-3" style="color:red">
                        <small id="district_err"><?php echo $district_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="branch_name" class="col-sm-2 col-form-label">Branch name</label>
                <div class="col-sm-10">
                    <input type="text" name="branch_name" class="form-control" id="branch_name" value="<?php echo $row['branch_name'] ?>">
                    <span class="help-block mb-3" style="color:red">
                        <small id="branch_err"><?php echo $branch_name_err; ?></small>
                    </span>
                </div>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" name="update_profile" value="Update" class="btn btn-primary">
                <a class="btn btn-primary" href="update_password.php">Update Password</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>

