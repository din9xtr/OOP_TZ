<?php
$to      = 'test@example.com';
$subject = 'Test Email';
$message = 'This is a test email.';
$headers = 'From: webmaster@example.com' . "\r\n" .
           'Reply-To: webmaster@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Email failed to send.';
}
