<?php
require_once('config.php');

// su dung truy xuat co so du lieu nhuw: insert delete update
function execute($sql){
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    
    mysqli_query($con,$sql);

    mysqli_close($con);
}
// dung cho cau lenh select tra ve ket qua 
function executeResult($sql)
{ 
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $data = array();
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result,1)){
        $data[] = $row;
    }
    mysqli_close($con);
    return $data;
}