
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register_Now_</title>
    <link rel="stylesheet" type="text/css" href="CSSfiles/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div id="User_Details">
        <p>Register_<span>Now:</span></p>
        <br>
            <div class="form" name="signup">
                    <p>First Name:</p>
                    <br>
                    <label class="firstnameBox">
                        <input type="text" placeholder="Enter your First Name" id="firstname" name="firstname">
                        <br>
                        <span class="firstnameText" id="firstnamee"></span>
                    </label>
                   
                    <p>Last Name:</p>
                    <br>
                    <label class="laststnameBox">
                        <input type="text" placeholder="Enter your Last Name" id="lastname" name="lastname">\
                        <br>
                        <span class="lastnameText" id="lastnamee"></span>
                    </label>
                    
                    <p>Email ID:</p>
                    <br>
                    <label class="emailBox">
                        <input type="email" placeholder="Enter your Email Id" id="email" name="email">
                        <br>
                        <span class="emailText" id="emaill"></span>
                    </label>
                    
                    <p>Mobile NO:</p>
                    <br>
                    <label class="phoneBox">
                        <input type="number" placeholder="Enter your Mobile No" id="number" name="number">
                        <br>
                        <span class="phoneText" id="numberr"></span>
                    </label>

                    <p>Password:</p>
                    <br>
                    <label class="passBox">
                        <input type="password" placeholder="Enter your Password" id="password" name="password">
                        <br>
                        <span class="passText" id="passwordd"></span>
                    </label>
                
                    <p>Gender:</p>
                    <label class="genderBox">
                        <input type="text" placeholder="Enter your Gender" id="gender" name="gender">
                        <br>
                        <span class="genderText" id="genderr"></span>
                    </label>
                    
                    <p>Age:</p>
                    <label class="ageBox">
                        <input type="number" placeholder="Enter your Age" id="age" name="age">
                        <br>
                        <span class="ageText" id="agee"></span>
                    </label>

                |   <p>Date of Birth:</p>
                    <br>
                    <label class="dobBox">
                        <br>
                        <input type="date" placeholder="Enter your DOB" id="dob" name="dob">
                        <br>
                        <span class="dobText" id="dobb"></span>
                    </label>

                    <p>Bio:</p>
                    <label class="bioBox">
                        <input type="text" placeholder="Enter your Bio" id="bio" name="bio">
                        <br>
                        <span class="bioText" id="bioo"></span>
                    </label>
                    <br>
                    <br>
                    <button type="submit"  name="submit" id="signup" class="update" value="Sign_Up">Signup</button>
            </div>
        </div>
        <!-- Email Address Varification -->
        <script>
            $(document).ready(function(){
                $('#signup').click(function (e){

                    var Emaill = $('#email').val();
                    

                $.ajax({
                    type: "POST",
                    url: "email_valid_connection.php",
                    data: {
                        'check_email':1,
                        'email':Emaill,
                        },
                        success: function (response){
                        
                            if(response == "This Email is Already Exists! Please Enter Another Email.."){
                                $('#emaill').text(response);
                                document.getElementById('emaill').style.color = "red";
                            }
                            else{
                                $('#emaill').text(response);
                                document.getElementById('emaill').style.color = "yellow";
                                alert("You are Successfully Registered in our Website"); 
                                sendData(); 
                            }
                        }    
                    });

                });
            });

            function sendData() {

                let firstname = $("#firstname").val();
                let lastname = $("#lastname").val();
                let email = $("#email").val();
                let number = $("#number").val();
                let password = $("#password").val();
                let gender = $("#gender").val();
                let age = $("#age").val();
                let dob = $("#dob").val();
                let bio = $("#bio").val();

                $(document).ready(function () {
                    $.ajax({
                        type: "post",
                        url: "register_connection.php",
                        data: {
                            'firstname': firstname,
                            'lastname': lastname,
                            'email': email,
                            'number': number,
                            'password': password,
                            'gender': gender,
                            'age': age,
                            'dob': dob,
                            'bio': bio
                        },
                        success: function (data) {
                        location.replace("login.php");
                                }
                    });
                });
            }

        // <!-- validation register page -->

            document.getElementById("firstname").addEventListener("input", checkfname);
            function checkfname() {
            const pattern = /[A-Za-z]/i;
            let first_name = event.target.value;

            if (first_name == "") {
                document.getElementById("firstnamee").innerHTML = "First name should not be Empty";
                document.getElementById("firstnamee").style.color = "red";
                return false;
            }
            else if (!pattern.test(first_name)) {

                document.getElementById("firstnamee").innerHTML = "First Name should be in alphabets";
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
                document.getElementById("emaill").innerHTML = "Valid Vaild Email Id";
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
            else if ((Number.length<10) || (Number.length>10 )) {

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
            else if (Age.length>2) {

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