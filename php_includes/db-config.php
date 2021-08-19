<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'contacts-via-resume';

    $connect = new mysqli($server, $username, $password, $db);

    // if ($connect -> connect_error) {
    //     die('Sorry! An Error Occured.');
    // }
?>