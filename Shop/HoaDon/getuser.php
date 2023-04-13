<?php
require '../connect.php';
$sql="select * from nguoidung";
$result=mysqli_query($connect,$sql);
$listuser=[];
foreach($result as $item){
    $t = array();
    $t["MaNguoiDung"] = $item["MaNguoiDung"];
    $t["TenNguoiDung"] = $item["TenNguoiDung"];
    $t["SoDienThoai"] = $item["SoDienThoai"];
    $t["DiaChi"] = $item["DiaChi"];
    $t["Email"] = $item["Email"];
    $t["TaiKhoan"] = $item["TaiKhoan"];
    $t["MatKhau"] = $item["MatKhau"];
    $t["TrangThai"] = $item["TrangThai"];
    // Mảng JSON
    array_push($listuser, $t);
}
echo json_encode($listuser);