<?php
require '../connect.php';
$masp=$_GET['MaSP'];
$sql="select sanpham.*,Size,SoLuong,DonGia from sanpham inner join ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP where sanpham.MaSP='$masp'";
$result=mysqli_query($connect,$sql);
$lispro=[];
foreach($result as $each){
    $t = array();
    $t["AnhSanPham"] = $each["AnhSanPham"];
    $t["MaSP"] = $each["MaSP"];
    $t["TenSP"] = $each["TenSP"];
    $t["MoTaSanPham"] = $each["MoTaSanPham"];   
    $t['size']=$each['Size'];
    $t['soluong']=$each['SoLuong'];
    $t['DonGia']=$each['DonGia'];
    $t["TrangThai"] = $each["TrangThai"];
    // Mảng JSON
    array_push($lispro, $t);
}
echo json_encode($lispro);

