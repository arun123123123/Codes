<?php
//session

session_start();

require_once ('php/connection.php');
require_once('php/component.php');
$sql="SELECT * FROM burger";
$result = mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);




    


if(isset($_POST['add'])){
   /// print_r($_POST['product_id']);
   if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], column_key:"product_id");

    if(in_array($_POST['product_id'],$item_array_id)){
        echo "<script>alert('product is already added in the cart..!')</script>";
        echo "<script>window.location ='index.php'</script>";
    }else{
        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id'=> $_POST['product_id']
        );
        $_SESSION['cart'][$count] = $item_array;

    }
   }else{
    $item_array = array(
        'product_id'=> $_POST['product_id']
    );

    //create new session variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);

   }
}

?>