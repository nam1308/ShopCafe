<?php
require '../connect.php';
$masp=$_POST['masp'];
$size=$_POST['Size'];
$tensp=$_POST['tensp'];
$dongia=$_POST['dongia'];
$soluong=$_POST['soluong'];
if(empty($masp)||empty($size)||empty($dongia)||empty($soluong)){
    header("location:add-detail-product.php?MaSP=$masp&TenSP=$tensp&error=Them that bai");
    exit();
}else{
$sql="select count(*) from ct_sanpham where MaSP='$masp' and Size=$size";
$result=mysqli_query($connect,$sql);
$number_row=mysqli_fetch_array($result)['count(*)'];
if($number_row<=0){
$sql="INSERT INTO ct_sanpham(MaSP, Size, SoLuong, DonGia) VALUES ('$masp','$size','$soluong','$dongia')";
mysqli_query($connect,$sql);
header("location:add-detail-product.php?MaSP=$masp&TenSP=$tensp&success=Them thanh cong"); 
exit();   
}
header("location:add-detail-product.php?MaSP=$masp&TenSP=$tensp&success=Them thanh cong"); 
exit();  

}