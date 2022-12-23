<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "customer";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}
if (true) {
    $email = $_POST['email'];
    
    $query = "SELECT email FROM userdata WHERE email='$email' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        echo "This Email is Already Exists! Please Enter Another Email..";
    } else {
        echo "Valid! Email,This Email Id is Available..";

    }
}

?>