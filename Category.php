<?php
require './connect.php';
$sql="SELECT phanloai.*,COUNT(MaSP) as sosanpham from phanloai INNER JOIN sanpham on sanpham.MaPhanLoai=phanloai.MaPhanLoai GROUP BY phanloai.MaPhanLoai";
$result=mysqli_query($connect,$sql);
$listcategory=[];
foreach($result as $item){
    $i= [];
    $i['MaPhanLoai']=$item['MaPhanLoai'];
    $i['TenPhanLoai']=$item['TenPhanLoai'];
    $i['MoTa']=$item['MoTa'];
    $i['sosanpham']=$item['sosanpham'];
    array_push($listcategory,$i);
}
echo json_encode($listcategory);