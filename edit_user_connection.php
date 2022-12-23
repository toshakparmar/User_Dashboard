<?php
session_start();
$_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "customer");
$email_id = $_SESSION['email'];


if (isset($_POST['update'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $bio = $_POST['bio'];

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE userdata SET firstname='$firstname', lastname='$lastname', email='$email', number='$number', password='$hashpassword'
        , gender='$gender', age='$age', dob='$dob', bio='$bio' WHERE email='$email'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>
            alert("Your User_Details Successfully Updated");
            window.location.href="User_Dashboard.php";
            </script>';
    } else {
        echo '<script>
            alert("Wrong!!! Your User_Details Not Updated");
            window.location.href="edit_user.php";
            </script>';
    }
}
?>