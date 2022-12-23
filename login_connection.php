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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $sql_query = "Select * from dataset where email= '$email' AND password= '$password'";
    $sql_query = "Select * from userdata where email= '$email'";
    $result = mysqli_query($conn, $sql_query);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['pass'] = $password;

                echo '<script>
                alert("You Successfully Login in our Website");
                window.location.href="User_Dashboard.php";
                </script>';
            }
        }
    } else {
        echo '<script>
        alert("Wrong!!! Please Check your Details:& Try Again");
        window.location.href="login.php";
        </script>';
    }
    mysqli_close($conn);
}
?>