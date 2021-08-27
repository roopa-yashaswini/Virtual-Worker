<?php include "header.php" ?>
<?php include "../check_errors.php" ?>
<?php
    $curr_password_err = $new_password_err = $confirm_password_err = "";
    $fields_array = array(
        array("curr_password", "curr_password_err", "Enter Old Password"),
        array("new_password", "new_password_err", "Enter Password"),
        array("confirm_password", "confirm_password_err", "Reenter New Password")
    );
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['update'])){
            $id = $_SESSION['user_id'];
            $curr_password = $_POST['curr_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            for($i=0; $i<count($fields_array); $i++){
                if(empty(${$fields_array[$i][0]})){
                    ${$fields_array[$i][1]} = $fields_array[$i][2];
                }else{
                    ${$fields_array[$i][1]} = '';
                }
            }

            if(!empty($new_password) && !empty($confirm_password)){
                if(strlen($curr_password) < 8){
                    $curr_password_err = "Password must have minimum 8 characters";
                }
                if(strlen($new_password) < 8){
                    $new_password_err = "Password must have minimum 8 characters";
                }
                if(strlen($confirm_password) < 8){
                    $confirm_password_err = "Password must have minimum 8 characters";
                }
                if($new_password != $confirm_password){
                    $confirm_password_err = "Passwords do not match";
                }
            }

            $errors_array = array($curr_password_err, $new_password_err, $confirm_password_err);
            if(isempty($errors_array) == 0){
                $id = $_SESSION['user_id'];
                $curr_password = md5($curr_password);
                $sql = "SELECT * FROM $table_employees WHERE id = '$id' AND password = '$curr_password'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) == 1){
                    $new_password = md5($new_password);
                    $sql = "UPDATE $table_employees SET password = '$new_password' WHERE id = '$id'";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        $msg = '<div class="alert alert-success" role="alert">
                            Password Changed.
                        </div>';
                    }else{
                        $msg = '<div class="alert alert-danger" role="alert">'.
                                mysqli_error($con).
                            '</div>';
                    }
                }else{
                    $msg = '<div class="alert alert-danger" role="alert">
                                Current Password is incorrect.
                            </div>';
                }
            }else{
                $msg = '<div class="alert alert-danger" role="alert">
                                Errors Present.
                            </div>';
            }
        }
    }

?>

<div class="col-9 my-lg-0 my-1">
    <div id="main-content" class="bg-white border">
    <?php echo isset($msg)?$msg:''; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="mb-3 row">
                <label for="curr_password" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input type="password" name="curr_password" class="form-control" id="curr_password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="new_password" class="form-control" id="new_password" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                </div>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" name="update" value="Update Password" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
</div>
</div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>

