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
    session_start();
    $result = $_POST['proname'];
    $output = explode(" ", $result);

    $P_id = $output[0];
    $_SESSION['value'] = $P_id;
    $proname = $output[1];
      
    $query = "SELECT * FROM productdata WHERE P_id='$P_id' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $row) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Product_Details</title>
    <link rel="stylesheet" type="text/css" href="CSSfiles/add_product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div id="User_Details">
        <p>Edit_Product_<span>Details:</span></p>
        <br>
        <br>
        <form action="edit_product_connection.php" method="POST" class="form" name="signup">
            <p>Product Name:</p>
            <br>
            <label>
                <input type="text" placeholder="Enter the Product Name" id="proname" name="proname" value="<?= $row['proname']; ?>">
                <br>
                <span id="pronamee"></span>
            </label>
            <br>
            <p>Category Name:</p>
            <br>
            <br>
            <label>
                <input type="text" placeholder="Enter the Product Category Name" id="catyname" name="catyname" value="<?= $row['catyname'];?>">
                <br>
                <span id="catynamee"></span>
            </label>

            <p>Price:</p>
            <br>
            <label>
                <input type="number" placeholder="Enter the Price of the Product" id="price" name="price" value="<?= $row['price'];?>">
                <br>
                <span id="pricee"></span>
            </label>
            <br>
            <p>Slug(Product_ID):</p>
            <br>
            <br>
            <label>
                <input type="text" placeholder="Enter the Unique Product Id(slug)" id="slug" name="slug" value="<?= $row['slug'];?>">
                <br>
                <span id="slugg"></span>
            </label>

            <p>Quantity:</p>
            <br>
            <label>
                <input type="number" placeholder="Enter the Product Quantity" id="quantity" name="quantity" value="<?= $row['quantity'];?>">
                <br>
                <span id="quantityy"></span>
            </label>
            <br>
            <br>
            <button type="submit" name="update" id="add" class="update">Update</button>
        </form>
    </div>
    <?php
        }
    } else {

    }
}
?>
<script>
    // validation register page

    document.getElementById("proname").addEventListener("input", checkproname);
    function checkproname() {
        let pro_name = event.target.value;
        if (pro_name == "") {
            document.getElementById("pronamee").innerHTML = "Product name should not be Empty";
            document.getElementById("pronamee").style.color = "red";
            return false;
        }
        else {
            document.getElementById("pronamee").innerHTML = "Valid Product Name";
            document.getElementById("pronamee").style.color = "yellow";
        }
    }
    document.getElementById("catyname").addEventListener("input", checkcatyname);
    function checkcatyname() {
        let caty_name = event.target.value;

        if (caty_name == "") {
            document.getElementById("catynamee").innerHTML = "Product Catagory name should not be Empty";
            document.getElementById("catynamee").style.color = "red";
            return false;
        }
        else {
            document.getElementById("catynamee").innerHTML = "Valid Product Catagory Name";
            document.getElementById("catynamee").style.color = "yellow";
        }
    }
    document.getElementById("slug").addEventListener("input", checkslug);
    function checkslug() {
        let slug = event.target.value;

        if (slug == "") {
            document.getElementById("slugg").innerHTML = "Product Slug should not be Empty";
            document.getElementById("slugg").style.color = "red";
            return false;
        }
        else {
            document.getElementById("slugg").innerHTML = "Valid Product Slug";
            document.getElementById("slugg").style.color = "yellow";
        }
    }
    document.getElementById("price").addEventListener("input", checkprice);
        function checkprice() {
            let price = event.target.value;
            if (price == "") {

                document.getElementById("pricee").innerHTML = "Product Price should not be Empty";
                document.getElementById("pricee").style.color = "red";
                return false;
            }
            else {
                document.getElementById("pricee").innerHTML = "Valid Product Price";
                document.getElementById("pricee").style.color = "yellow";
            }
        }
        document.getElementById("quantity").addEventListener("input", checkquantity);
        function checkquantity() {
            let quantity = event.target.value;
            if (quantity == "") {

                document.getElementById("quantityy").innerHTML = "Product Quantity should not be Empty";
                document.getElementById("quantityy").style.color = "red";
                return false;
            }
            else {
                document.getElementById("quantityy").innerHTML = "Valid Product Quantity";
                document.getElementById("quantityy").style.color = "yellow";
            }
        }

</script>
</body>
</html>