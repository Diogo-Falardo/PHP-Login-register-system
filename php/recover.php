<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // FOR THE MOMENT 
    $errorMessage = "Our team is working on a solution";
    $pageTitle = "Ups";

    header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
    exit;

}else {
    // IF PAGE IS DIRECTLY OPEN
    $errorMessage = "Oops! Page not found!";
    $pageTitle = "404 - Page Not Found";

    header("Location: /my-website/report.php?errorMessage=" . urlencode($errorMessage) . "&pageTitle=" . urlencode($pageTitle));
    exit;
}
?>