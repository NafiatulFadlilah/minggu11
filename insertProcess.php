<?php
    include "myconnection.php";

    $name = $_POST["myname"];
    $address = $_POST["myaddress"];

    $target_path = "image/";
    $foto = $_FILES['myfoto']['name'];

    move_uploaded_file($_FILES['myfoto']['tmp_name'], $target_path.$foto);

    $query = "INSERT INTO student(name, address, foto)
                VALUE('$name', '$address', '$foto')";

    if(mysqli_query($connect, $query)){
        header('Location:homeCRUD.php');
    }else{
        echo "Data baru gagal ditambahkan <br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>