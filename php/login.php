<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if username is not empty
    if (isset ($_POST["username-log"]) && !empty ($_POST["username-log"])) {
        $nome = $_POST["username-log"];
    } else {
        $errorMessage = "The username field is mandatory";
        $pageTitle = "404 - username";
    
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

    $chk_username = $conn->prepare("SELECT username FROM users WHERE username =  ? "); // QUERY
    $chk_username->bind_param("s", $_POST["username-log"]); // "s" means that is a string & STRING
    $chk_username->execute();
    $chk_username_result = $chk_username-> get_result();

    $chk_password = $conn->prepare("SELECT password FROM users WHERE password = ?");
    $chk_password->bind_param("s", $_POST["passoword-log"]); 
    $chk_password->execute();
    $chk_password_result = $chk_password->get_result();

    if ($chk_username_result->num_rows > 0) {
    
    }else{
        $errorMessage = "User Not Found";
        $pageTitle = "404 - User ";
    
        header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
        exit;

    }

}else {
    // IF PAGE IS DIRECTLY OPEN
    $errorMessage = "Oops! Page not found!";
    $pageTitle = "404 - Page Not Found";

    header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
    exit;
}
?>