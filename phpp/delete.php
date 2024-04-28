<!--DELETE LLGIC-->

<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id=$delete_id") or die("Query failed");

    if ($delete_query) {
        echo "Product deleted";
        header('location: viewproduct.php');
    } else {
        echo "There is an error in deleting the product";
    }
}
?>
