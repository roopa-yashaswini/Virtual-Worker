<?php include "./database.php"; ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $application_type = $_POST['application_type'];
        $no = $_POST['application_no'];
        if($application_type == 'Credit Card'){
            $sql = "SELECT * FROM $table_credit_card_applications WHERE token_number = '$no'";
            //$names = $credit_card_names;
        }elseif($application_type == 'New Account'){
            $sql = "SELECT * FROM $table_account_open WHERE token_number = '$no'";
            //$names = $account_names;
        }else if($application_type == 'Personal Loan'){
            $sql = "SELECT * FROM $table_loan_applications WHERE token_number = '$no'";
            //$names = $loan_names;
        }
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($row['application_status'] != 'Submitted'){
            $emp_id = $row['handed_by'];
            $sql = "SELECT * FROM $table_employees WHERE id = '$emp_id'";
            $result = mysqli_query($con, $sql);
            $emp_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/0d2df49e16.js" crossorigin="anonymous"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

    <link rel="stylesheet" href="credit_card/form_style.css?v=2">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="text-center w-75">
                <div class="card pt-4 px-4 mt-3 mb-3">
                    <h2><strong>Check Application Status</strong></h2>
                    <br>
                    
                    <form id="msform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-row">
                            <!-- <div class="form-group col-sm-4">
                                <label for="staticEmail2">Application Number</label>
                            </div> -->
                            <div class="col">
                                <select class="custom-select" name="application_type">
                                    <option selected value="">Choose Application Type</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="New Account">New Account</option>
                                    <option value="Personal Loan">Personal Loan</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="application_no" class="sr-only">Application Number</label>
                                <input type="text" class="form-control" id="application_no" name="application_no" placeholder="Application Number" required>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Check</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="container py-2">
                        <?php
                            if(isset($row)){
                        ?>
                            Application submitted at: <?php echo $row['submit_date'];?>
                            <br>
                            Status: <?php echo $row['application_status'];?>
                            <br>
                            <?php 
                                if($row['application_status'] != 'Submitted'){
                            ?>
                                    Handed By: <?php echo $emp_row['name'];  ?>
                                    <br>
                                    Branch: <?php echo $emp_row['branch_name'].', '.$emp_row['district'];  ?>
                                    <br>
                                    Verified at: <?php echo $row['verify_date']; ?> 
                                    <br>      
                            <?php
                                }
                            ?>
                            <?php 
                                if($row['application_status'] == 'Discarded'){
                            ?>
                                    Reason for Disapproval: <?php echo $row['discard_reason'];  ?> 
                                    <br>      
                            <?php
                                }
                            ?>
                            <?php
                            //print_r($row);
                        ?>
                        <?php
                            }
                        ?>
                    </div>
                    <a href="index.php" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>