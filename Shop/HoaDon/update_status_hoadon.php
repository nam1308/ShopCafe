<?php
require '../connect.php';
$mahdb=$_GET['MaHDB'];
$trangthai=$_GET['trangthai'];
$spl="update hoadonban set TinhTrang=$trangthai where MaHDB='$mahdb'";
$_result=mysqli_query($connect,$spl);
echo $trangthai;