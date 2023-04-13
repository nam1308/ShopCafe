<?php
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
require './connect.php';
$mapl=empty($_GET['MaPhanLoai'])?'':" and MaPhanLoai='".$_GET['MaPhanLoai']."'";

$sql='SELECT sanpham.*,Size,SoLuong,DonGia FROM sanpham INNER JOIN ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP where TrangThai=1'.$mapl;
$result=mysqli_query($connect,$sql);
$lispro=[];
foreach($result as $each){
    $t = array();
    $t["MaSP"] = $each["MaSP"];
    $t["TenSP"] = $each["TenSP"];
    $t["DonGia"] = $each["DonGia"];
    $t["TrangThai"] = $each["TrangThai"];
    $t["MoTaSanPham"] = $each["MoTaSanPham"];
    $t["AnhSanPham"] = $each["AnhSanPham"];
    $t["MaPhanLoai"] = $each["MaPhanLoai"];
    $t["MaHSX"] = $each["MaHSX"];
    $t["Size"]=$each["Size"];
    $t["SoLuong"]=$each["SoLuong"];
    // Mảng JSON
    array_push($lispro, $t);
 }
echo json_encode($lispro);