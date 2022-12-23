<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Now_</title>
    <link rel="stylesheet" type="text/css" href="CSSfiles/login.css">
</head>

<body>
    <div id="Login">
        <p id="head">Login_<span>Now</span></p>
        <br>
        <br>
        <form action="login_connection.php" method="POST">
            <p class="row">Email:</p>
            <label class="emailBox">
                <input type="email" id="email" placeholder="Enter your Email" name="email">
                <br>
                <span id="emaill"></span>
            </label>
            <br>
            <p class="row">Password:</p>
            <br>
            <label class="passBox">
                <input type="password" id="password" placeholder="Enter your Password" name="password">
                <br>
                <span id="passwordd"></span>
            </label>
            <br>
            <br>
            <button type="submit" class="clear" name="submit">Login</button>
            <p><a href="register.php">Sign_Up</a></p>
        </form>
    </div>
    <script>

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

    </script>
</body>

</html>