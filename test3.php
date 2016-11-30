<?php
   require_once 'dbconnect.php';

$query = "SELECT file FROM chops_etudes WHERE id = 1";
$res = mysqli_fetch_array(mysqli_query($conn, $query));

echo $res[0];

?>
<html>
     <img src="<?= $res[0] ?>" style="width:304px;height:228px;">
     <img src="http://www.oreshko.co.uk/carcassi/study1.gif" >

</html>