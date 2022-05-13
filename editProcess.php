<?php
    include "myconnection.php";

    $id = $_POST["myid"];
    $name = $_POST["myname"];
    $address = $_POST["myaddress"];

    $target_path = "image/";
    $foto = $_FILES['myfoto']['name'];

    move_uploaded_file($_FILES['myfoto']['tmp_name'], $target_path.$foto);

    $query = "UPDATE student SET name='$name', address='$address', foto='$foto' WHERE id ='$id'";

    if(mysqli_query($connect, $query)){
        header('Location:homeCRUD.php');
    }else{
        echo "Gagal mengubah data <br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>