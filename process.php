<?php


$mysqli = new mysqli('localhost', 'root', 'localhost8080', 'pizza_system') or die(mysqli_error(mysqli));


$id = 0;
$update = false;
$name = '';
$phone= '' ;
$address = '';
$price= '' ;
$type= '' ;


if(isset($_POST['save'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
     header("location: blackpizza.php");
    
    
    $mysqli->query("INSERT INTO customers(name, phone, address, price, type) VALUES('$name', '$phone', '$address', '$price', '$type' )") or die($mysqli->error);
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM customers WHERE id=$id") or die($mysqli->error());
    
     $_SESSION['message'] = "Record has been deleted!";
     $_SESSION['msg_type'] = "danger";
    
     header("location: blackpizza.php");
    
   
}
//edit function
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM customers WHERE id=$id") or die($mysqli->error());
    //Check if there is data first
    if (count($result)==1) {
        $row = $result->fetch_array();
        
       
        $name = $row['name'];
        $phone = $row['phone'];
        $address = $row['address'];
        $price = $row['price'];
        $type = $row['type'];
         
    }
    }
 if (isset($_POST['update'])){
        $name = $_POST['name'];
        $stage = $_POST['phone'];
        $grade = $_POST['address'];
        $award = $_POST['price'];
        $year = $_POST['type'];
        
        $mysqli->query("UPDATE student SET  name='$name',phone='$phone', address='$address', price='$price', type='$type' WHERE id=$id") or die($mysqli->error());
        
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "warning";
        
        header('location: blackpizza.php');
    
   
}

?>