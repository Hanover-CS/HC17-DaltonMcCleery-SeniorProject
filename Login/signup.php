<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Database/dbconnect.php';

    include 'signup_screen.html';

    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $query = "INSERT INTO chops_students (username, password, fname)
                  VALUES ('$username', '$password', '$fname')";

            $result = mysqli_query($conn, $query);

            if($result){
                header("Location: login.php");
            }}
?>