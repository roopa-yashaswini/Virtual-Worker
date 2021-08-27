<?php
    session_start();
    if(!isset($_SESSION['token_no'])){
		header('location: ./index.php');
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Number</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
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
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Application Number</strong></h2>
                    <p>Application has been successfully submitted.</p>
                    <p>Keep the Application Number for future references</p>
                    <br>
                    <h2><strong>Application Number: <?php echo $_SESSION['token_no'] ?></strong></h2>
                    <br>
                    <a href="index.php" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>