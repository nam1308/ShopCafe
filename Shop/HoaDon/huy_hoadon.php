<?php
require '../connect.php';
$mahdb=$_GET['MaHDB'];
$sql="select * from chitiethdb where MaHDB='$mahdb'";
$result=mysqli_query($connect,$sql);
foreach($result as $item){
    $sql="select * from ct_sanpham where MaSP='".$item['MaSP']."' and Size=".$item['Size'];
    $resultct=mysqli_query($connect,$sql);
    $each=mysqli_fetch_array($resultct);
    $soluong=intval($each['SoLuong'])+intval($item['SoLuong']);
    $sql="UPDATE ct_sanpham SET SoLuong=$soluong WHERE  MaSP='".$item['MaSP']."' and Size=".$item['Size'];
    mysqli_query($connect,$sql);
}
$sql="delete from chitiethdb where MaHDB='$mahdb'";
mysqli_query($connect,$sql);
$sql="delete from hoadonban where MaHDB='$mahdb'";
mysqli_query($connect,$sql);
echo $mahdb;