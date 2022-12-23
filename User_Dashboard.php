<?php
session_start();
$_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "customer");
$_GET['email'] = $_SESSION['email'];
if (isset($_GET['email'])) {
    $email_id = $_GET['email'];
    $query = "SELECT * FROM userdata WHERE email='$email_id' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $row) {

            $_SESSION['userid'] = $row['U_id'];
?>
<<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage_DESK_</title>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSSfiles/User_Dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    </head>

    <body>
        <header>
            <nav>
                <input type="checkbox" name="" id="openslideMenu">
                <label for="openslideMenu" class="slidebarIconToggle">
                    <div class="spiner top"></div>
                    <div class="spiner middle"></div>
                    <div class="spiner bottom"></div>
                </label>
                <div id="sidebarMenu">
                    <ul class="Menu">
                        <li class="rrr"><a href="edit_user.php">Edit</a></li>
                        <li class="rrr"><a href="login.php">Login</a></li>
                        <li class="rrr"><a href="register.php">Signup</a></li>
                        <li class="rrr"><a href="login.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo">
                    <p>Manage<span>_DESK_</span></p>
                </div>
                <div>
                    <input type="text" placeholder="Search Here Now" class="search">
                    <i class="fa fa-search btn"></i>
                </div>

                <div class="icon">
                    <button onclick="return user()">User Name:
                        <?php echo $row['firstname'] . " " . $row['lastname'] ?>
                    </button>
                    <button><a href="Add_Product.php">Add Product</a></button>
                </div>
            </nav>
            <button id="toggle1" onclick="return toggle()">Product_Details</button>
<div id="container">
    <div id="card">
            <div id="details">
                <h1>User_<span>Details<span></h1>
                <form id="myform" action="" method="GET">
                    <div class="row">
                        <label for="">First Name:</label>
                        <br>
                        <input type="text" class="user1" name="firstname" value="<?= $row['firstname'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Last Name:</label>
                        <br>
                        <input type="text" class="user1" name="lastname" value="<?= $row['lastname'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Email ID:</label>
                        <br>
                        <input type="email" class="user1" name="email" value="<?= $row['email'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Mobile No:</label>
                        <br>
                        <input type="number" class="user1" name="number" value="<?= $row['number'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Gender:</label>
                        <br>
                        <input type="text" class="user1" name="gender" value="<?= $row['gender'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Age:</label>
                        <br>
                        <input type="text" class="user1" name="age" value="<?= $row['age'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Date of Birth:</label>
                        <br>
                        <input type="date" class="user1" name="dob" value="<?= $row['dob'] ?>" readonly>
                    </div>
                    <div class="row">
                        <label for="">Bio:</label>
                        <br>
                        <input type="text" class="user1" name="bio" value="<?= $row['bio'] ?>" readonly>
                    </div>
                    <br>
                    <br>
                    <button class="edit"><a href="edit_user.php">Edit Data</a></button>
                    <!-- <button class="cancel" id="cancelBtn" onclick="return cancel()">OK</button> -->
                </form>
            </div>

            <div id="show">
                <div id="nav">
                    <p>Product<span>_Details</span></p>
                    <button onclick="return showedit()"><a>Edit Product</a></button>
                </div>
                <br>
                <?php
            $value = $row['U_id'];
            $query = "SELECT CONCAT(userdata.firstname,userdata.lastname)AS Name,productdata.proname,
                    productdata.catyname,productdata.price,productdata.slug,productdata.quantity
                    FROM productdata
                    INNER JOIN userdata
                    ON productdata.user_id = userdata.U_id
                    WHERE userdata.U_id = '$value'";
                $query_run = mysqli_query($conn, $query);
                ?>
                <table width="100%" border="2px">
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Catagory Name</th>
                    <th>Price</th>
                    <th>Slug</th>
                    <th>Quantity</th>
                    <?php while ($row = mysqli_fetch_assoc($query_run)) { ?>
                    <tr>
                        <td><?= $row['Name'] ?></td>
                        <td>
                            <?= $row['proname'] ?>
                        </td>
                        <td>
                            <?= $row['catyname'] ?>
                        </td>
                        <td>
                            <?= $row['price'] ?>
                        </td>
                        <td>
                            <?= $row['slug'] ?>
                        </td>
                        <td>
                            <?= $row['quantity'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php
        }
    } else {
        echo "No Record Found";
    }

} ?>
    </div>
</div>            
            <div id="mode_edit">
                <p>Select_Product_For_<span>Edit</span></p>
                <label>Product Name:</label>
                <?php
                    $query2 = "SELECT P_id,proname FROM productdata WHERE user_id ='$value'";
                    $query_run2 = mysqli_query($conn, $query2);
                ?>
                <form action="edit_product.php" method="POST">
                <select id="proname" name="proname">
                    <?php while ($row = mysqli_fetch_assoc($query_run2)) { ?>
                    <option>
                        <?= $row['P_id']." ".$row['proname'] ?>
                    </option>
                    <?php }
                    ?>
                </select>
                <button id="select" name="select"><a>Select</a></button>
                </form>     
            </div>
           
           <script>
                function showedit() {
                    document.getElementById('mode_edit').style.opacity = "1";
                    return true;
                }

                function toggle(){
                    var btn1 = document.getElementById('toggle1');
                    var card = document.getElementById('card');
                    if(btn1.innerHTML == "Product_Details"){
                        btn1.innerHTML = "User_Details";
                    }
                    else{
                        btn1.innerHTML = "Product_Details";
                    }
                    card.classList.toggle('flipped');
                }  
            </script>
    </body>

    </html>