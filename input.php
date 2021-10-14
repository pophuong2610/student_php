<?php
require_once('dbhelp.php');
$fullname = $age = $address = '';
// ktra xem co thong tin tu form co ton tai ko
    if(!empty($_POST)){
        $id = '';
        if(isset($_POST['name'])){
            $fullname = $_POST['name'];
        }
        if(isset($_POST['age'])){
            $age = $_POST['age'];
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $fullname = str_replace('\'','\\\'',$fullname);
        $age = str_replace('\'','\\\'',$age);
        $address = str_replace('\'','\\\'',$address);
        $id = str_replace('\'','\\\'',$id);
        if($id != ''){
            // update
            $sql = "UPDATE  info set hoten = '$fullname', tuoi = $age, diachi = '$address' where id = $id";
        }
        else{
             // insert
            $sql = "INSERT INTO  info(hoten,tuoi,diachi) values ('".$fullname."',".$age.",'".$address."')";
        }
       
        
        //echo $sql;
        execute($sql);
        header('location: index.php');
        die();
    }

    // edit
    $id = '';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'select * from info where id = '.$id;
        $listStudent = executeResult($sql);
        if($listStudent  != null && count($listStudent) > 0){
            $std = $listStudent[0];
            $s_fullname = $std['hoten'];
            $s_age = $std['tuoi'];
            $s_address = $std['diachi'];
        } else{
            $id = '';
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhap thong tin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
         <form action="" method="POST">
         <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter name" id="name" name="id" 
                value="<?= $id?>" style="display:none" >
                <label for="name">Họ và tên:</label>
                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" 
                value="<?= $s_fullname?>"
                >
            </div>
            <div class="form-group">
                <label for="age">Tuổi:</label>
                <input type="number" class="form-control" placeholder="Enter age" id="age" name="age"
                value="<?= $s_age ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" placeholder="Enter address" id="address" name="address"
                value="<?= $s_address ?>">
            </div>
            <button type="submit" class="btn btn-primary"> Save  </button>
         </form>
     </div>
</body>
</html>