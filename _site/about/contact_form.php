<?php
// Fetching Values from URL.
$name    = $_POST['name1'];
$email   = $_POST['email1'];
$message = $_POST['message1'];
$email   = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = $name;
        // To send HTML mail, the Content-type header must be set.
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: noreply@erehwonartfoundation.org' . "\r\n"; // Sender's Email
        $headers .= 'Reply-To: ' . $email . "\r\n"; // Sender's Email
        // $headers .= 'Cc:' . $email . "\r\n"; // Carbon copy to Sender
        // $template    = '<div style="padding:50px; color:white;">Hello ' . $name . ',<br/>' . '<br/>Thank you...! For Contacting Us.<br/><br/>' . 'Name:' . $name . '<br/>' . 'Email:' . $email . '<br/>' . 'Contact No:' . $contact . '<br/>' . 'Message:' . $message . '<br/><br/>' . 'This is a Contact Confirmation mail.' . '<br/>' . 'We Will contact You as soon as possible .</div>';
        // $template    = 'Name: ' . $name . "\r\n" . 'Email: ' . $email . "\r\n" . "Message:\r\n" . $message . "\r\n";        
        $template    = $message . "\r\n";        
        $sendmessage = $template;
        // Message lines should not exceed 70 characters (PHP rule), so wrap it.
        $sendmessage = wordwrap($sendmessage, 70);
        // Send mail by PHP Mail Function.
        mail("info@erehwonartfoundation.org", $subject, $sendmessage, $headers);
        //mail("klangga@gmail.com", $subject, $sendmessage, $headers);
        echo "Your query has been received, we will contact you soon.";
} else {
    echo "<span>* invalid email *</span>";
}

?>
