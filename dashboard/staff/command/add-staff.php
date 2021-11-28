<?php
include_once('../lib/connection.php');


  if(isset($_POST['submit'])){
    $nama_product = $_POST['nama_product'];
    $price = $_POST['price'];
    $category = $_POST['kategori'];
    $thumbnail = $_FILES['thumbnail']['name'];
    
    if($thumbnail !=""){
      $extension_accepted = ['png','jpg','svg'];
      $x = explode('.', $thumbnail);
      $extension = strtolower(end($x));
      $file_tmp = $_FILES['thumbnail']['tmp_name'];
      $rand = rand(1,999);
      $new_name = $rand . '-' . $thumbnail;

      if(in_array($extension,$extension_accepted)){
        move_uploaded_file($file_tmp,'../../public-thumbnail/' . $new_name);
        $query = "INSERT INTO products(nama,harga,thumbnail,kategori) VALUES(
          '$nama_product','$price','$new_name','$category'
        )";
        $result = mysqli_query($conn, $query);
        if(!$result){
          die("The query failed  : " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
        }else{
          echo "<script>alert('Successfully Added Data.');window.location='../create.php';</script>";
        }
      }
      else{
        echo "<script>alert('Extensions aren't allowed.');window.location='../create.php';</script>";
      }
    }
    else{
      $query = "INSERT INTO products(nama,harga,kategori) VALUES(
        '$nama_product','$price','$category
      )";
      $result = mysqli_query($conn,$query);
      if(!$result){
        die("The query failed : " . mysqli_errno($conn) .
          " - " . mysqli_error($conn));
      }else{
        echo "<script>alert('Successfully Added Data.');window.location='../create.php';</script>";
      }
    }
  }
  else{
    echo "Error, Button hasn't been pressed!";
  }
