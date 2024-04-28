<?php include 'connect.php' ?>
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


<div class="container">
    <div class="row mt-2">
    <h1>view products</h1>
    </div>
    <br>
    <div class="row">
    
    <!--PHP CODE-->
     <?php
$display_product = mysqli_query($conn, "SELECT * FROM `products`");
$num=1;
     if(mysqli_num_rows($display_product)>0){
        echo '<table>
        <thead>
            <th class="p-2 flex-fill">sn.</th>
            <th class="p-2 flex-fill">Product id</th>
            <th class="p-2 flex-fill">Product name</th>
            <th class="p-2 flex-fill">Product image</th>
            <th class="p-2 flex-fill">Product price</th>
            <th class="p-2 flex-fill">Action</th>
        </thead>';

        //logic to fetch data
       
     while($row=mysqli_fetch_assoc($display_product)){
    ?>
  
<!--DISPLAY TABLE-->

<tbody>
<td class="p-2 flex-fill"><?php echo$num; ?></td>
    <td class="p-2 flex-fill"><?php echo$row['id']; ?></td>
    <td class="p-2 flex-fill"><?php echo$row['name']; ?></td>
    <td class="p-2 flex-fill">
    <img src="image/<?php echo $row['image']?>" alt="<?php echo $row['name']?>" width="220" height="200">
</td>

    <td class="p-2 flex-fill"><?php echo$row['price']; ?></td>
    <td class="p-2 flex-fill">
    <a href="delete.php?delete=<?php echo $row['id'];?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete <?php echo $row['name']; ?> product')">
    <i class="fa-solid fa-trash"></i>
</a>
 &nbsp&nbsp
        <a href="update_products.php?update_products=<?php echo $row['id'];?>" class="edit_product_btn"><i class="fa-regular fa-pen-to-square"></i>  </a>
    </td>
</tbody>


<?php
$num++;
     }
     }else{
        echo "<div class='empty_text'>No Products Available</div>";
         }
     ?>
  

</table>
</div>
  
    </div>
</div>
    
    <!--JS link-->
    <script src="script.js"></script>
    <!--Bootstrap LINK-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

