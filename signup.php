<!DOCTYPE html>
<html>

  <head>

    <title>Sign Up</title>
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
                   <br/>Click here to <a href='login.php'>Login</a>";
        }
    }else{
?>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign Up!</b></div>
                
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Username  :</label><input type = "text" name = "username" class = "box" required /><br>
                  <label>Password  :</label><input type = "password" name = "password" class = "box" required /><br>
                  <label>Name  :</label><input type = "fname" name = "fname" class = "box" required /><br>
                  <input type = "submit" name="submit" value = "Register"/><br>
                  <p>Already registered? <a href='login.php'>Login Here</a></p>
               </form>
            </div>
          </div>
      </div>
<?php } ?>
  </body>
</html>