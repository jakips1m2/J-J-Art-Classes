<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// PHP script for sending class schedule email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['email'], $_POST['date'], $_POST['time'])) {
    // Sanitize input data to prevent SQL injection and XSS attacks
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Set recipient email address
    $to = "judet.v789@gmail.com";
    $subject = "Class Schedule Request";

    // Email content
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Date: $date\n";
    $message .= "Time: $time\n";

    // Headers
    $headers = "From: $email";

    // Debugging output (remove in production)
    echo "<pre>";
    echo "To: $to\n";
    echo "Subject: $subject\n";
    echo "Message:\n$message\n";
    echo "Headers: $headers\n";
    echo "</pre>";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo '<p style="color:green;">Your class schedule request has been sent successfully.</p>';
    } else {
        echo '<p style="color:red;">Failed to send your class schedule request. Please try again later.</p>';
    }
}
?>
