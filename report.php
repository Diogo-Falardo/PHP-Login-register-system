<?php
//  RECEIVE MESSAGE || IF NO RECEIVE DISPLAY JUST AN ERROR
if(isset($_GET['errorMessage']) && isset($_GET['pageTitle'])) {
    $errorMessage = $_GET['errorMessage'];
    $pageTitle = $_GET['pageTitle'];
} else {
    $errorMessage = "This Page Does Not Exist!";
    $pageTitle = "Error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet"
    />
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <div class="error-msg">
        <h1>Report</h1>
        <h3><?php echo $errorMessage; ?></h3>
        <button onclick="returnindex()">Return</button>
    </div>
    <div id="bg"></div>
    <!--JS-->
    <script type="text/javascript" src="js/particles.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
        function returnindex(){
            window.location.href = '/my-website/index.html';
        }
    </script>
</body>
</html>