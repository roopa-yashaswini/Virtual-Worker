<?php
    session_start();
    if(isset($_SESSION['token_no'])){
        session_destroy();
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Bank</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');</style>
        <link rel="stylesheet" href="dashboard_style.css">
        <style>
            .card-img-top {
                width: 100%;
                height: 60vh;
                object-fit: cover;
            }
            .card{
                background-color: #f4f0ec;
            }
            .card-title{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <div class="d-flex">
                    <!-- <div class="d-flex align-items-center logo bg-purple">
                        <div class="fab fa-joomla h2 text-white"></div>
                    </div> -->
                    <div class="ms-3 d-flex flex-column">
                        <div class="h4">Bank App</div>
                        <!-- <div class="fs-6">My pet App</div> -->
                    </div>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="./credit_card/credit_card.php">Apply for Credit Card</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="./account_open/account_form.php">Open New Account</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="./personal_loan/loan_form.php">Apply for Personal Loan</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="./check_status.php">Check Application Status</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="./authentication.php"> <span class="fas fa-user pe-2"></span>Employee</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-4">
        <div class="row">
            <div class="card-group">
                <!-- <div class="col"> -->
                    <div class="card mx-3">
                        <img src="images/credit_card_picture.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Credit Card</h5>
                            <p class="card-text">People above the age of 18 and with a minimum income of Rs. 20,000 can apply for a Credit Card.</p>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <div class="col"> -->
                    <div class="card mx-3">
                        <img src="images/open_account_picture.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">New Account</h5>
                            <p class="card-text">People of age below 18 are only eligible for Kids Advantage Account. Others are eligible for Savings, Savings Max, Savings Salary, and Current account.</p>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <div class="col"> -->
                    <div class="card mx-3">
                        <img src="images/personal_loan_picture.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Personal Loan</h5>
                            <p class="card-text">People within the age of 21 and 60 along with a minimum income of Rs. 25,000 can apply for a Personal Loan.</p>
                        </div>
                    </div>
                <!-- </div> -->
    
    
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>