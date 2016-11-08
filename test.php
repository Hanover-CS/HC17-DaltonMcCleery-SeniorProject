<?php

require_once 'dbconnect.php';

//find Dalton in the chops_students table
$query = "SELECT fname FROM chops_students WHERE fname = 'Dalton'";

//if the query was successful..
if ($result = mysqli_query($conn, $query)) {

    //get a "row" or array of the results
    $row = mysqli_fetch_array($result);

    echo "FOUND Dalton! ";
    //and print them out
    print_r($row);
}

//find test in the chops_students table
$query = "SELECT * FROM chops_students WHERE fname != 'Dalton'";

echo "                                  ";

//if the query was successful..
if ($result = mysqli_query($conn, $query)) {

    //get a "row" or array of the results
    $row = mysqli_fetch_array($result);

    echo ("Found Others --- ");
    //and print them out
    print_r($row);
}

//find the etude titled "5+2=7" in  the chops_etudes table
$query2 = "SELECT name FROM chops_etudes WHERE name = '5+2=7'";

//if the query was successful..
if ($result = mysqli_query($conn, $query2)) {

    //get a "row" or array of the results
    $row = mysqli_fetch_array($result);

    echo ("Found Etude! --- ");
    print_r($row);

}
?>