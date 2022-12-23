<?php
session_start();
$_SESSION['value'];
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "customer";

$conn = mysqli_connect($servername, $username, $password, $database_name);
$result = $_SESSION['value'];

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}
if (isset($_POST['update'])) {
    $proname = $_POST['proname'];
    $catyname = $_POST['catyname'];
    $price = $_POST['price'];
    $slug = $_POST['slug'];
    $userid = $_POST['user_id'];
    $quantity = $_POST['quantity'];


    $query = "UPDATE productdata SET proname='$proname', catyname='$catyname', price='$price', slug='$slug', 
            quantity='$quantity' WHERE P_id='$result'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>
            alert("Your Product_Details Successfully Updated");
            window.location.href="User_Dashboard.php";
            </script>';
    } else {
        echo '<script>
            alert("Wrong!!! Your Product_Details Not Updated");
            window.location.href="edit_product.php";
            </script>';
    }
}
?>