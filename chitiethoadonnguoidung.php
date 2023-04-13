<?php
require './connect.php';
$mahdb=$_GET['mahdb'];
$sql="select chitiethdb.*,TenSP from chitiethdb inner join sanpham on sanpham.MaSP=chitiethdb.MaSP where MaHDB='$mahdb'";
$result=mysqli_query($connect,$sql);
$lstchitiet=[];
foreach($result as $item){
    $lst=[];
    $lst['Size']=$item['Size'];
    $lst['DonGia']=$item['DonGia'];
    $lst['SoLuong']=$item['SoLuong'];
    $lst['MaSP']=$item['MaSP'];
    $lst['MaHDB']=$item['MaHDB'];
    $lst['TenSP']=$item['TenSP'];
    array_push($lstchitiet, $lst);
}
echo json_encode($lstchitiet);