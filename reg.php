<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('dbconnect.php');

// If form submitted, insert values into the database.
if (isset($_POST['username'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $query = "INSERT INTO chops_students (username, password, fname)
              VALUES ('$username', '$password', '$fname')";

        $result = mysqli_query($conn, $query);
        //echo ($result);
        if($result){
            echo " <h3>You are registered successfully!</h3>
                   <br/>Click here to <a href='logscreen.php'>Login</a>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="reg" action="" method="POST">
<input type="text" name="username" placeholder="Username" required />
<input type="fname" name="fname" placeholder="name" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>

    --- --- FIX THIS --- ---

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
                
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Username  :</label><input type = "text" name = "username" class = "box" /><br>
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br>
                  <input type = "submit" value = " Submit "/><br>
                  <p>Not registered yet? <a href='reg.php'>Sign Up Here</a></p>
               </form>