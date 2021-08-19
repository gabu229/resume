<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // echo $name . $email . $message;

        require 'db-config.php';

        $insert_data = "INSERT INTO contacts (contact, email, message) VALUES ('.$name.', '.$email.', '.$message.')";

        if ($connect -> query($insert_data) === TRUE) {
            // echo 'good';
            $_SESSION['message'] = 'Your message has been successfully sent! Thanks for your response.';
            $_SESSION['message'] = '<div class="col-10 col-md-8 offset-md-2 offset-1 alert alert-success alert-dismissable fade show" role="alert"><p>' . $_SESSION["message"] . '</p></div>';

            header('location: ../index.php');
        }
        else {
            echo 'bad';
            echo $connect -> error;
        }
    }
?>