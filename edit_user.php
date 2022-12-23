<?php
session_start();
$_SESSION['email'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_User_Details_</title>
    <link rel="stylesheet" type="text/css" href="CSSfiles/edit_user.css">
</head>

<body>
    <div id="User_Details">
        <?php
        if (isset($_SESSION['status'])) {
            //echo"<h4>".$_SESSION['status']."</h4>";
            unset($_SESSION['status']);
        }
        $_SESSION['email'];
        if (isset($_SESSION['email'])) {
            $conn = mysqli_connect("localhost", "root", "", "customer");

            $email_id = $_SESSION['email'];
            $query = "SELECT * FROM userdata WHERE email='$email_id' ";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {

                foreach ($query_run as $row) {
                    $pass = $_SESSION['pass'];
        ?>
        <p>Update_<span>Data:</span></p>
        <br><br>
        <form action="edit_user_connection.php" method="POST">
            <div class="row">
                <label for="">First Name:</label>
                <input type="text" class="user1" id="firstname" name="firstname" value="<?= $row['firstname'] ?>">
                <br>
                <span id="firstnamee"></span>
            </div>
            <div class="row">
                <label for="">Last Name:</label>
                <input type="text" class="user1" id="lastname" name="lastname" value="<?= $row['lastname'] ?>">
                <br>
                <span id="lastnamee"></span>
            </div>
            <div class="row">
                <label for="">Email ID:</label>
                <input type="email" class="user1" id="email" name="email" value="<?= $row['email'] ?>">
                <br>
                <span id="emaill"></span>
            </div>
            <div class="row">
                <label for="">Mobile No:</label>
                <input type="number" class="user1" id="number" name="number" value="<?= $row['number'] ?>">
                <br>
                <span id="numberr"></span>
            </div>
            <div class="row">
                <label for="">Password:</label>
                <input type="text" class="user1" id="password" name="password" value="<?= $pass ?>">
                <br>
                <span id="passwordd"></span>
            </div>
            <div class="row">
                <label for="">Gender:</label>
                <input type="text" class="user1" id="gender" name="gender" value="<?= $row['gender'] ?>">
                <br>
                <span id="genderr"></span>
            </div>
            <div class="row">
                <label for="">Age:</label>
                <input type="text" class="user1" id="age" name="age" value="<?= $row['age'] ?>">
                <br>
                <span id="agee"></span>
            </div>
            <div class="row">
                <label for="">Date of Birth:</label>
                <input type="date" class="user1" name="dob" value="<?= $row['dob'] ?>">
                <br>
                <span id="dobb"></span>
            </div>
            <div class="row">
                <label for="">Bio:</label>
                <input type="text" class="user1" name="bio" value="<?= $row['bio'] ?>">
                <br>
                <span id="bioo"></span>
            </div>
            <br>
            <br>
            <button type="submit" name="update" class="update">Update data</button>
            <button class="cancel"><a href="User_Dashboard.php">Cancel</a></button>
        </form>
    </div>
    <script>
        document.getElementById("firstname").addEventListener("input", checkfname);
        function checkfname() {
            const pattern = /[A-Za-z]/i;
            let first_name = event.target.value;

            if (first_name == "") {
                document.getElementById("firstnamee").innerHTML = "First name should not be Empty";
                document.getElementById("firstname").style.borderBottom = "2px solid red"
                document.getElementById("firstnamee").style.color = "red";
                return false;
            }
            else if (!pattern.test(first_name)) {

                document.getElementById("firstnamee").innerHTML = "First Name should be in alphabets";
                document.getElementById("firstname").style.borderBottom = "2px solid red"
                document.getElementById("firstnamee").style.color = "red";
                return false;
            }
            //     for(i=0;i<=first_name.length;i++){
            //     char ch =first_name.charAt(i);
            //     else if ((ch>=48) && (ch<=57)){

            //         document.getElementById("firstnamee").innerHTML = "First Name should be in alphabets";
            //         document.getElementById("firstname").style.borderBottom = "2px solid red"
            //         document.getElementById("firstnamee").style.color = "red";
            //         return false;

            //     }
            // }
            else {
                document.getElementById("firstnamee").innerHTML = "Valid First Name";
                document.getElementById("firstname").style.borderBottom = "2px solid green"
                document.getElementById("firstnamee").style.color = "yellow";
            }
        }
        document.getElementById("lastname").addEventListener("input", checklname);
        function checklname() {
            const pattern = /[A-Za-z]/i;
            let last_name = event.target.value;
            if (last_name == "") {

                document.getElementById("lastnamee").innerHTML = "Last name should not be Empty";
                document.getElementById("lastnamee").style.color = "red";
                return false;
            }
            else if (!pattern.test(last_name)) {

                document.getElementById("lastnamee").innerHTML = "Last Name should be in alphabets";
                document.getElementById("lastnamee").style.color = "red";
                return false;
            }
            else {
                document.getElementById("lastnamee").innerHTML = "Valid Last Name";
                document.getElementById("lastnamee").style.color = "yellow";
            }
        }
        document.getElementById("email").addEventListener("input", checkemail);
        function checkemail() {
            const pattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;
            let Email = event.target.value;
            if (Email == "") {

                document.getElementById("emaill").innerHTML = "Email Address should not be Empty";
                document.getElementById("emaill").style.color = "red";
                return false;
            }
            else if (!pattern.test(Email)) {

                document.getElementById("emaill").innerHTML = "Email Address should be example@gmail.com";
                document.getElementById("emaill").style.color = "red";
                return false;
            }
            else {
                document.getElementById("emaill").innerHTML = "Valid Email Address";
                document.getElementById("emaill").style.color = "yellow";
            }
        }
        document.getElementById("number").addEventListener("input", checknumber);
        function checknumber() {
            let Number = event.target.value;
            if (Number == "") {

                document.getElementById("numberr").innerHTML = "Mobile Number should not be Empty";
                document.getElementById("numberr").style.color = "red";
                return false;
            }
            else if (isNaN(Number)) {

                document.getElementById("numberr").innerHTML = "Mobile Number should be Enter only numbers";
                document.getElementById("numberr").style.color = "red";
                return false;
            }
            else if ((Number.length < 10) || (Number.length > 10)) {

                document.getElementById("numberr").innerHTML = "Mobile Number should be Enter only 10 Digits";
                document.getElementById("numberr").style.color = "red";
                return false;
            }
            else {
                document.getElementById("numberr").innerHTML = "Valid Mobile Number";
                document.getElementById("numberr").style.color = "yellow";
            }
        }
        document.getElementById("password").addEventListener("input", checkpassword);
        function checkpassword() {
            let Password = event.target.value;
            const Pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            if (Password == "") {

                document.getElementById("passwordd").innerHTML = "Password should not be Empty";
                document.getElementById("passwordd").style.color = "red";
                return false;
            }
            else if (!Pattern.test(Password)) {

                document.getElementById("passwordd").innerHTML = "Your password must be at least 6 characters as well as contain at least one uppercase, one lowercase, and one number";
                document.getElementById("passwordd").style.color = "red";
                return false;
            }
            else {
                document.getElementById("passwordd").innerHTML = "Valid Password";
                document.getElementById("passwordd").style.color = "yellow";
            }
        }
        document.getElementById("gender").addEventListener("input", checkgender);
        function checkgender() {
            let Gender = event.target.value;
            if (Gender == "") {

                document.getElementById("genderr").innerHTML = "Gender should not be Empty";
                document.getElementById("genderr").style.color = "red";
                return false;
            }
            else if (!isNaN(Gender)) {

                document.getElementById("genderr").innerHTML = "Gender should be Enter in Aphabets";
                document.getElementById("genderr").style.color = "red";
                return false;
            }
            else {
                document.getElementById("genderr").innerHTML = "Valid Gender";
                document.getElementById("genderr").style.color = "yellow";
            }
        }
        document.getElementById("age").addEventListener("input", checkage);
        function checkage() {
            let Age = event.target.value;
            if (Age == "") {

                document.getElementById("agee").innerHTML = "Age should not be Empty";
                document.getElementById("agee").style.color = "red";
                return false;
            }
            else if (Age.length > 2) {

                document.getElementById("agee").innerHTML = "Age should be Enter only in Digits ";
                document.getElementById("agee").style.color = "red";
                return false;
            }
            else {
                document.getElementById("agee").innerHTML = "Valid Age";
                document.getElementById("agee").style.color = "yellow";
            }
        }
    </script>
</body>

</html>
<?php
                }
            } else {
                echo "No Record Found";
            }
        }
        ?>