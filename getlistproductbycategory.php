<?php
require './connect.php';
$maphanloai=$_GET['maphanloai'];
$price=$_GET['gia'];
$search=$_GET['search'];
$arrayprice=[];
$gia='';
$begin;
$end;
if($price!=''){
    $price=str_replace("đ","",$price);
    $price=str_replace(".","",$price);
   $arrayprice=explode(' ',trim($price)); 
   $begin=$arrayprice[0];
   $end=$arrayprice[count($arrayprice)-1];
   if($begin=='>'||$begin=='<'){
        $gia='dongia '.$begin.' '.$end;
   }
   else{
   
    $gia='DonGia >= '.$begin.' and DonGia <= '.$end;
   }
}
else{
    $gia ='DonGia > -1';
}
if($maphanloai==''||$maphanloai=='PL'){
$maphanloai="MaPhanLoai like '%%'";
}else{
    $maphanloai=str_replace("-","' or sanpham.MaPhanLoai='",$maphanloai);
    $maphanloai="(sanpham.MaPhanLoai='".$maphanloai."')";
}
//echo $maphanloai;
$sql="SELECT sanpham.*,Size,SoLuong,DonGia FROM sanpham INNER JOIN ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP where $maphanloai and $gia and sanpham.TenSP like '%$search%' and TrangThai=1";
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
//echo $sql;