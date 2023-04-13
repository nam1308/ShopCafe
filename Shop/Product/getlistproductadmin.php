<?php
require '../connect.php';
$spl='SELECT sanpham.*,TenHSX,TenPhanLoai from sanpham INNER JOIN hangsanxuat on hangsanxuat.MaHSX=sanpham.MaHSX 
INNER JOIN phanloai on phanloai.MaPhanLoai=sanpham.MaPhanLoai';
$result=mysqli_query($connect,$spl);
$lispro=[];
foreach($result as $each){
    $t = array();
    $t["AnhSanPham"] = $each["AnhSanPham"];
    $t["MaSP"] = $each["MaSP"];
    $t["TenSP"] = $each["TenSP"];
    $t["MoTaSanPham"] = $each["MoTaSanPham"];
    $t["MaPhanLoai"] = $each["MaPhanLoai"];
    $t['TenPhanLoai']=$each['TenPhanLoai'];
    $t["MaHSX"] = $each["MaHSX"];
    $t['TenHSX']=$each['TenHSX'];
    $t["TrangThai"] = $each["TrangThai"];
    // Mảng JSON
    array_push($lispro, $t);
}
echo json_encode($lispro);