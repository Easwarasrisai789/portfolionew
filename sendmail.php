<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email address
    $to = 'eswarvenky931@gmail.com'; // Replace with your email address

    // Email subject
    $subject = 'New Contact Form Submission';

    // Email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>Thank you for contacting me! I will get back to you soon.</p>";
    } else {
        echo "<p>Sorry, something went wrong. Please try again later.</p>";
    }
} else {
    // If not POST request
    header("HTTP/1.1 405 Method Not Allowed");
    echo "<p>Method Not Allowed</p>";
}
?>
