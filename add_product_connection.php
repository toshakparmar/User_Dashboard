<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "customer";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $proname = $_POST['proname'];
    $catyname = $_POST['catyname'];
    $price = $_POST['price'];
    $slug = $_POST['slug'];
    $userid = $_POST['user_id'];
    $quantity = $_POST['quantity'];


    $sql_query = "INSERT INTO `productdata` (`proname`, `catyname`, `price`, `slug`, `user_id`, `quantity`) 
    VALUES ('$proname', '$catyname', '$price', '$slug', '$userid', '$quantity')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
        alert("You Successfully Add Product in your Database");
        window.location.href="User_Dashboard.php";
        </script>';
    } else {
        echo '<script>
        alert("Wrong!!! You are not Add Product in your Database");
        window.location.href="Add_Product.php";
        </script>';

        echo "Error:" . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>