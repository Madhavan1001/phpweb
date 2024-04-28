<?php
include 'connect.php';

if(isset($_POST['add_product'])){
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_cost'];
    $prod_image_temp_name = $_FILES['prod_img']['tmp_name'];
    $prod_image = $_FILES['prod_img']['name'];

    $product_image_folder = 'image/' . $prod_image;

    $insert_query = mysqli_query($conn, "INSERT INTO products (id, name, price, image) VALUES ('$prod_id', '$prod_name', '$prod_price', '$prod_image')") or die("insert_query failed");

    if($insert_query){
        move_uploaded_file($prod_image_temp_name, $product_image_folder);
     $display_message= "Product inserted successfully";
    } else {
        $display_message= "There is an error in inserting product";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <!--css llink -->
    <link rel="stylesheet" href="style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrp link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!--HEADER INCLUDE-->
    <?php include 'header.php'?>
    <?php include 'connect.php'?>

    <section>
    <div class="container mtg-5">
        <br>
        <!-- DISPLAY MESSAGE -->
        <?php
        if(isset($display_message)){
            echo "<div class='display_message'>
                <span>$display_message</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display=\"none\"';></i>
            </div>";
        }
        ?>

        <br>
        <h3 class="mt-5">ADD PRODUCTS</h3>
        <form class="add_product" method="post" enctype="multipart/form-data"><br>
            <input type="text" name="prod_name" placeholder="product name" class="input_field" required><br><br>
            <input type="number" name="prod_id" placeholder="product id" class="input_field" required><br><br>
            <input type="number" name="prod_cost" placeholder="cost" min="0" class="input_field" required><br> <br>
            <input type="file" name="prod_img" class="input_field" required accept="image/png, image/jpg, image/jpeg"><br><br>
            <input type="submit" name="add_product" class="input_field" value="Add Product"><br><br>
        </form>
    </div>
</section>


    <!--JS link-->
    <script src="script.jss"></script>
    <!--Bootstrap LINK-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
