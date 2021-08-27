<?php 
    include "../database.php";
    session_start();
    if(!isset($_SESSION['user_id'])){
		header('location: ../authentication.php');
		die();
	}
    $uri = $_SERVER['REQUEST_URI'];
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
        <script type='text/javascript' src='application_script.js'></script>
        <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');</style>
        <link rel="stylesheet" href="dashboard_style.css">
        <style>
            .card{
                background-color: #dcdcdc;
            }
            .form-inline{
                display: inline;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="../index.php">
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
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="../credit_card/credit_card.php">Apply for Credit Card</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="../account_open/account_form.php">Open New Account</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="../personal_loan/loan_form.php">Apply for Personal Loan</a> </li>
                    <li class="nav-item"> <a class="nav-link  <?php echo $uri == '/se/view_applications/update_profile.php' ?  'active' : '' ?>" href="update_profile.php"> <span class="fas fa-user pe-2"></span><?php echo $_SESSION['name']; ?></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../logout.php"> <span class="fas fa-sign-out-alt pe-2"></span></a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-4">
        <div class="row">
            <div class="col-sm-2">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <li class="<?php echo $uri == '/se/view_applications/dashboard.php' ?  'active' : '' ?>" > 
                            <a href="dashboard.php" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Pending Applications</div>
                                    <div class="link-desc">All pending applications</div>
                                </div>
                            </a> 
                        </li>
                        <li class="<?php echo $uri == '/se/view_applications/credit_card_pending.php' ?  'active' : '' ?>"> 
                            <a href="credit_card_pending.php" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Credit Card Applications</div>
                                    <div class="link-desc">Pending Credit Card Applications</div>
                                </div>
                            </a> 
                        </li>
                        <li class="<?php echo $uri == '/se/view_applications/new_account_pending.php' ?  'active' : '' ?>"> 
                            <a href="new_account_pending.php" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">New Account Applications</div>
                                    <div class="link-desc">Pending New Account Applications</div>
                                </div>
                            </a> 
                        </li>
                        <li class="<?php echo $uri == '/se/view_applications/personal_loan_pending.php' ?  'active' : '' ?>">
                            <a href="personal_loan_pending.php" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Loan Applications</div>
                                    <div class="link-desc">Pending Loan Applications</div>
                                </div>
                            </a>
                        </li>
                        <li class="<?php echo $uri == '/se/view_applications/hand_in_applications.php' ?  'active' : '' ?>">
                            <a href="hand_in_applications.php" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Handed Applications</div>
                                    <div class="link-desc">Applications need to be verified</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>