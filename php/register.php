<?php
// check for the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if username is not empty
    if (isset ($_POST["username"]) && !empty ($_POST["username"])) {
        $nome = $_POST["username"];
    } else {
        $errorMessage = "The username field is mandatory";
        $pageTitle = "404 - username";
    
        header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
        exit;
    }

    // Check if email is not empty or invalid
    if (isset ($_POST["email"]) && !empty ($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST["email"];
    } else {
        $errorMessage = "The Email field is mandatory and must be a valid email address.";
        $pageTitle = "404 - email";
    
        header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
        exit;
    }

    // DATABASE CONFIG
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "dougo";

    // connect to database
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // CHECK IF IS ALREADY A USER OR AN EMAIL WITH THE SAME NAME/EMAIL <- IMPORTANT

    $chk_username = $conn->prepare("SELECT username FROM users WHERE username =  ? "); // QUERY
    $chk_username->bind_param("s", $_POST["username"]); // "s" means that is a string & STRING
    $chk_username->execute();
    $chk_username_result = $chk_username-> get_result();

    $chk_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $chk_email->bind_param("s", $_POST["email"]); 
    $chk_email->execute();
    $chk_email_result = $chk_email->get_result();


    if ($chk_username_result->num_rows > 0) {
        $errorMessage = "That username is already in use";
        $pageTitle = "404 - username";
    
        header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
        exit;

    } elseif ($chk_email_result->num_rows > 0) {
    
        $errorMessage = "That email is already in use";
        $pageTitle = "404 - email";
    
        header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
        exit;

    }
    else{
        $ins_username = $_POST["username"];
        $ins_password = $_POST["password"];
        $ins_email = $_POST["email"];

        $ins_query = $conn->prepare("INSERT INTO users(username,password,email) VALUES (?,?,?)");
        $ins_query->bind_param("sss", $ins_username, $ins_password, $ins_email);

        if ($ins_query->execute()) {
            $errorMessage = "Welcome " . $ins_username . "!";
            $pageTitle = "Welcome";
        
            header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
            exit;
            
        } else {
            $errorMessage = "There was a error creating your account!";
            $pageTitle = "404 - Error Registering";
        
            header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
            exit;
        }
    }

} else {
    // IF PAGE IS DIRECTLY OPEN
    $errorMessage = "Oops! Page not found!";
    $pageTitle = "404 - Page Not Found";

    header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
    exit;
}
?>