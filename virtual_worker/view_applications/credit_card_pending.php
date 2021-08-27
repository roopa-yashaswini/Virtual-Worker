<?php include "header.php" ?>
            <div class="col-lg-9 my-lg-0 my-1">
                <div id="main-content" class="bg-white border">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                            $district = $_SESSION['district'];
                            $sql = "SELECT application_no, CONCAT_WS(' ', f_name, l_name) AS 'name', submit_date FROM $table_credit_card_applications WHERE handed_by IS NULL AND district = '$district'";
                            $result = mysqli_query($con, $sql);
                            // $crows = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $applications = array();
                            if(mysqli_num_rows($result) > 0){
                                while($crow = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    $crow['app_type'] = 'Credit Card';
                                    array_push($applications, $crow);
                                }
                            }
                            $submit_date = array_column($applications, 'submit_date');
                            array_multisort($submit_date, $applications);
                            $i=0;
                            for($i=0;$i<count($applications); $i++){
                        ?>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $applications[$i]['app_type']; ?></h5>
                                            <p class="card-text"><?php echo $applications[$i]['name']; ?></p>
                                            <form action="application.php" method="POST">
                                                <input type="hidden" name="app_type" value="<?php echo $applications[$i]['app_type']; ?>">
                                                <input type="hidden" name="application_no" value="<?php echo $applications[$i]['application_no']; ?>">
                                                <button type="submit" class="btn btn-primary stretched-link">
                                                    View Application
                                                </button>
                                            </form>
                                            <!-- <a href="view_applications/credit_card_application.php" class="btn btn-primary stretched-link">View Application</a> -->
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            Submitted at: <?php echo $applications[$i]['submit_date']; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    </body>
</html>
