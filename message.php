<?php

//Getting the form values
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)) { //If email & message field is not empty
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //If email is valid
        
        //Recieving email address
        $reciever = "ansaaryounos@gmail.com";

        //Subject of the email
        $subject = "From: $name <$email>";

        //The generated email, merging all the user values. \n is a new line
        $body = "
        Name: $name \n
        Email: $email \n
        Phone: $phone \n
        Website: $website \n\n
        Message: $message\n\n
        Regards: $name";

        //Sender's email
        $sender = "From: $email";

        if(mail($reciever, $subject, $body, $sender)) {
            echo "Your message has been sent!";
        } else {
            echo "Sorry, failed to send your message";
        }


    } else {
        echo "Enter a valid email address!";
    }
} else {
    echo "Email & message required!";
}