<?php
    require_once('dbhelp.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center>Quản lý thông tin sinh viên</center>
                <form action="" method="GET">
                    <input type="text" placeholder="tim kiem theo ten" class="form-control" name = "search" style="margin:20px 0;">
                </form>
            </div>
            <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Tuổi</th>
                    <th>Địa chỉ</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
<!-- hiển thị thông tin sinh viên -->

<?php

// tim kiem
    if (isset($_GET['search']) && $_GET['search'] != '') {
        # code...
        $s = $_GET['search'];
        $sql = 'select * from info where hoten like "%'.$s.'%"';
    } else {
        # code...
        $sql = 'select * from info';
    }
    
            $i = 0;
           
            $studentList = executeResult($sql);
            foreach ($studentList as $student ){
                $i++;
                echo ' <tr>
                <td>'.$i.'</td>
                <td>'.$student['hoten'].'</td>
                <td>'.$student['tuoi'].'</td>
                <td>'.$student['diachi'].'</td>
                <td><button class= "btn btn-warning" onclick=window.open("input.php?id='.$student['id'].'","_self")>edit</button></td>
                <td><button class= "btn btn-danger" onclick = "deleteStudent('.$student['id'].')">delete</button></td>
            </tr>';
            }
?>
                </tbody>
            </table>
            <button class= "btn btn-success" onclick="window.open('input.php','_self'
            )">Add student</button>
            </div>
        </div>
    </div>
    <script type = "text/javascript">
        function deleteStudent(id) {
            option = confirm("Banj chac chan xoa chua?");
            if(!option)
            {
                return;
            }
            $.post('delete_student.php',{
                'id' : id
            }, function (data){
                alert(data);
                location.reload();
            });
        }
    </script>
</body>
</html>