<?php
require '../connect.php';
$masp=$_GET['MaSP'];
if(empty($masp)){
    echo 0;
}
else{
$sql="DELETE FROM ct_sanpham WHERE MaSP='$masp'";
mysqli_query($connect,$sql);
$sql="DELETE FROM anhsp WHERE MaSP='$masp'";
mysqli_query($connect,$sql);
$sql="DELETE FROM sanpham WHERE MaSP='$masp'";
mysqli_query($connect,$sql);
echo 1;   
}
