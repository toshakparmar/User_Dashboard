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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $bio = $_POST['bio'];

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $sql_query = "INSERT INTO `userdata` (`firstname`, `lastname`, `email`, `number`, `password`, `gender`, `age`, `dob`, `bio`) 
    VALUES ('$firstname', '$lastname', '$email', '$number', '$hashpassword', '$gender', '$age', '$dob', '$bio')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
        alert("You Successfully Sign_Up in our Website");
        window.location.href="login.php";
        </script>';
    } else {
        echo '<script>
        alert("Wrong!!! You Not Sign_Up in our Website");
        window.location.href="register.php";
        </script>';

        echo "Error:" . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>