<?php
$masp=$_GET['MaSP'];
$status=$_GET['status'];
require '../connect.php';
$spl="update sanpham set TrangThai=$status where MaSP='$masp'";
$_result=mysqli_query($connect,$spl);
echo $status;