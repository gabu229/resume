<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // echo $name . $email . $message;

        require 'db-config.php';

        $insert_data = "INSERT INTO contactss (contact, email, message) VALUES ('.$name.', '.$email.', '.$message.')";

        if ($connect -> query($insert_data) === TRUE) {
            // echo 'good';
            $_SESSION['message'] = 'Your message has been successfully sent! Thanks for your response.';
            $_SESSION['message'] = '<div class="col-10 col-md-8 offset-md-2 offset-1 alert alert-success alert-dismissable fade show" role="alert"><p>' . $_SESSION["message"] . '</p></div>';

            header('location: ../index.php');
        }

        // THE CONDITION BELOW WILL RETURN TRUE BECAUSE OF AGSENCE OF DATABASE

        else {
            $file = fopen('contacts.txt', 'a');
            $cnt = "Name:      " . $name . " \n" . "Email:     " . $email . " \n" . "Message:   " . $message . "\nDate:      "  . date("Y-m-d h:i:s:a") . " \n \n \n" ;
            fwrite($file, $cnt);

            $_SESSION['message'] = 'Your message has been successfully sent! Thanks for your response.';
            $_SESSION['message'] = '<div class="col-10 col-md-8 offset-md-2 offset-1 alert alert-success alert-dismissable fade show" role="alert"><p>' . $_SESSION["message"] . '</p></div>';

            header('location: ../index.php');
        }
    }
?>