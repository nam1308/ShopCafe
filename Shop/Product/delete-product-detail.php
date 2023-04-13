<?php
require '../connect.php';
$masp=$_GET['MaSP'];
$size=$_GET['Size'];
if(empty($masp) || !is_numeric($size)){
    echo 0;
}
else{
 $sql="DELETE FROM ct_sanpham WHERE MaSP='$masp' and Size=$size";
$result=mysqli_query($connect,$sql);
echo 1;   
}
