<?php 
include 'connect.php';

// Update logic
if(isset($_POST['update_product'])){
    $update_product_id = $_POST['update_product_id'];
    $update_product_name = $_POST['update_product_name'];
    $update_product_price = $_POST['update_product_cost'];

    // Handle image upload
    $update_product_image = $_FILES['update_product_image']['name'];
    $update_product_image_temp_name = $_FILES['update_product_image']['tmp_name'];
    $update_product_image_name = $_FILES['update_product_image']['name'];
    $update_product_image_folder = 'image/' . $update_product_image_name;
    move_uploaded_file($update_product_image_temp_name, $update_product_image_folder);

    // Update query
    $update_products = mysqli_query($conn, "UPDATE `products` SET name='$update_product_name', price='$update_product_price', image='$update_product_image_folder' WHERE id=$update_product_id");

    if($update_products){
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>


;<!DOCTYPE html>
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
<?php include 'header.php' ?>
<div class="main ml-5 mt-5">
    <h3>UPDATE PRODUCT</H3>
</div>

<section class="edit_container ml-5">
    <!--PHP CODE-->
    <?php 
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    //echo $edit_id;
    $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$edit_id ");

    if(mysqli_num_rows($edit_query) > 0){
        while($fetch_data = mysqli_fetch_assoc($edit_query)){
           // $row = $fetch_data['price'];
            //echo $row;
            
        
?>




<!--FORM-->
<form action="update_products" method="post" enctype="multipart/form data"
 class="update_product_container_box">
<br>
    <img src="image/<?php echo $fetch_data['image'] ?>" alt="" width="220" height="200">   <br>   <br>
    <input type="text" name="update_product_id" value="<?php echo $fetch_data['id'];?>">  
       <br>   <br>
    <input type="text"  name="update_product_name"placeholder="name" value="<?php echo $fetch_data['name'];?>" class="input_filelds fileds" required>   <br>   <br>
    <input type="number" name="update_product_cost" placeholder="price" value="<?php echo $fetch_data['price'];?>" class="input_filelds fileds" required>   <br>   <br>
    <input type="file" class="input_filelds fileds" name="updste_product_image" required accept="image/png, image/jpg, image/jpeg">   <br>   <br>
<div class="iput">
    <input type="submit" name="update_product" value="Update Product" class="edit_btn">
    <input type="reset" value="Cancel" class="cancel_btn">
</div>
</form>


    <?php
}

}
}
?>

</section>
</body>
</html>