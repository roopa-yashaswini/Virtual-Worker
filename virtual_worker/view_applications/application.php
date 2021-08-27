<?php include "./index_names.php" ?>
<?php include "header.php" ?>
<?php
    if(isset($_POST['verify'])){
        $table_name = '';
        $application_no = $_POST['application_no'];
        $application_type = $_POST['app_type'];
        if($application_type == 'Credit Card'){
            $table_name = $table_credit_card_applications;
        }else if($application_type == 'New Account'){
            $table_name = $table_account_open;
        }else if($application_type == 'Personal Loan'){
            $table_name = $table_loan_applications;
        }
        $sql = "SELECT * FROM $table_name WHERE application_no = $application_no AND handed_by IS NULL";
        
        $result = mysqli_query($con, $sql);
        $id = $_SESSION['user_id'];
        if(mysqli_num_rows($result) > 0){
            $sql = "UPDATE $table_name SET handed_by = '$id', application_status = 'Handed In', verify_date = NOW() WHERE application_no = '$application_no'";
            $result = mysqli_query($con, $sql);
            if($result){
                ?>
                <script>
                    window.location.replace('hand_in_applications.php');
                </script>
                <?php
            }else{
                $msg = '<div class="alert alert-danger" role="alert">'.
                                mysqli_error($con).
                            '</div>';
            }
        }else{
            $msg = '<div class="alert alert-danger" role="alert">
                        Application Not Found
                    </div>';
        }
    }

    if(isset($_POST['accept'])){
        $table_name = '';
        $application_no = $_POST['application_no'];
        $application_type = $_POST['app_type'];
        if($application_type == 'Credit Card'){
            $table_name = $table_credit_card_applications;
        }else if($application_type == 'New Account'){
            $table_name = $table_account_open;
        }else if($application_type == 'Personal Loan'){
            $table_name = $table_loan_applications;
        }
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM $table_name WHERE application_no = $application_no AND handed_by = '$id' AND application_status = 'Handed In'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1){
            $sql = "UPDATE $table_name SET application_status = 'Accepted', verify_date = NOW() WHERE application_no = '$application_no'";
            $result = mysqli_query($con, $sql);
            if($result){
                ?>
                <script>
                    window.location.replace('hand_in_applications.php');
                </script>
                <?php
            }else{
                $msg = '<div class="alert alert-danger" role="alert">'.
                                mysqli_error($con).
                            '</div>';
            }
        }else{
            $msg = '<div class="alert alert-danger" role="alert">
                        Application Not Found
                    </div>';
        }

    }

    if(isset($_POST['discard'])){
        $table_name = '';
        $application_no = $_POST['application_no'];
        $application_type = $_POST['app_type'];
        $reason = trim($_POST['reason']);
        $id = $_SESSION['user_id'];
        if($application_type == 'Credit Card'){
            $table_name = $table_credit_card_applications;
        }else if($application_type == 'New Account'){
            $table_name = $table_account_open;
        }else if($application_type == 'Personal Loan'){
            $table_name = $table_loan_applications;
        }
        if(!empty($reason)){
            $sql = "SELECT * FROM $table_name WHERE application_no = '$application_no' AND handed_by = '$id' AND application_status = 'Handed In'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) == 1){
                $sql = "UPDATE $table_name SET application_status = 'Discarded', verify_date = NOW(), discard_reason = '$reason' WHERE application_no = '$application_no'";
                $result = mysqli_query($con, $sql);
                if($result){
                    ?>
                    <script>
                        window.location.replace('hand_in_applications.php');
                    </script>
                    <?php
                }else{
                    $msg = '<div class="alert alert-danger" role="alert">'.
                                    mysqli_error($con).
                                '</div>';
                }
            }else{
                $msg = '<div class="alert alert-danger" role="alert">
                            Application Not Found
                        </div>';
            }
        }
    }

?>

<div class="col-9 my-lg-0 my-1">
    <div id="main-content" class="bg-white border">
    <?php echo isset($msg)?$msg:''; ?>
        <div class="container">
            <table class="table table-striped table-hover table-bordered">
                <?php
                    $application_no = $_POST['application_no'];
                    $application_type = $_POST['app_type'];
                    $names = array();
                    if($application_type == 'Credit Card'){
                        $sql = "SELECT * FROM $table_credit_card_applications WHERE application_no = $application_no";
                        $names = $credit_card_names;
                    }elseif($application_type == 'New Account'){
                        $sql = "SELECT * FROM $table_account_open WHERE application_no = $application_no";
                        $names = $account_names;
                    }else if($application_type == 'Personal Loan'){
                        $sql = "SELECT * FROM $table_loan_applications WHERE application_no = $application_no";
                        $names = $loan_names;
                    }
                    
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    foreach($row as $x => $x_value) {
                        if($x == 'photo_proof' || $x == 'dob_proof' || $x == 'identification_proof' || $x == 'income_proof' || $x == 'signature_proof'){
                ?>
                            <tr>
                                <td><?php echo $names[$x]; ?></td>
                                <td class="w-50">
                                    <img src="<?php echo $x_value; ?>" alt="" class="img-fluid img-thumbnail">
                                </td>
                            </tr>
                <?php                
                        }else{
                ?>
                            <tr>
                                <td><?php echo $names[$x]; ?></td>
                                <td class="w-50"><?php echo $x_value; ?></td>
                            </tr>
                <?php
                        }
                    }
                ?>

            </table>
                <div class="text-center">
                    <?php
                        if(!$row['handed_by']){
                    ?>
                        <form action="" method="post">
                            <input type="hidden" name="application_no" value="<?php echo $application_no; ?>">
                            <input type="hidden" name="app_type" value="<?php echo $application_type; ?>">
                            <input type="submit" class="btn btn-primary" value="Verify" name="verify">
                        </form>
                    <?php
                        }else{
                    ?>
                            <form action="" method="post" class="form-inline">
                                <input type="hidden" name="application_no" value="<?php echo $application_no; ?>">
                                <input type="hidden" name="app_type" value="<?php echo $application_type; ?>">
                                <input type="submit" class="btn btn-success mb-3" value="Accept" name="accept">
                            </form>
                            <button class="btn btn-danger mb-3" name="discard_bt" id="discard">Discard</button>
                            <form action="" method="post">
                                <input type="hidden" name="application_no" value="<?php echo $application_no; ?>">
                                <input type="hidden" name="app_type" value="<?php echo $application_type; ?>">
                                <input type="text" class="form-control d-none mb-3" id="reason" name="reason" placeholder="Reason for Disapproval">
                                <input type="submit" class="btn btn-primary d-none mb-3" value="Submit" name="discard" id="discard_submit">
                            </form>
                    <?php
                        }
                    ?>
                </div>
                
        </div>
    </div>
</div>
</div>
</div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>

