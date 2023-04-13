<?php
require '../connect.php';
$mand=$_GET['MaND'];
$sql="SELECT hoadonban.*,IFNULL(khuyenmai.PhanTramGiam,0) as phantramkhuyenmai FROM hoadonban
 LEFT JOIN khuyenmai on hoadonban.MaKM=khuyenmai.MaKM where MaNguoiDung='$mand'";
$listhoadon=mysqli_query($connect,$sql);
$list=[];
foreach($listhoadon as $itemhd){
    $listhd=[];
            $listhd['MaHDB']=$itemhd['MaHDB'];
            $listhd['MaKM']=$itemhd['MaKM'];
            $listhd['NgayDatHang']=$itemhd['NgayDatHang'];
            $listhd['DiaChiDatHang']=$itemhd['DiaChiDatHang'];
            $listhd['TinhTrang']=$itemhd['TinhTrang'];
            $listhd['PTThanhToan']=$itemhd['PTThanhToan'];
            $listhd['GhiChu']=$itemhd['GhiChu'];
            $listhd['DonGia']=$itemhd['DonGia'];
            $listhd['TenNguoiNhan']=$itemhd['TenNguoiNhan'];
            $listhd['SDT']=$itemhd['SDT'];
            $listhd['Email']=$itemhd['Email'];
            $listhd['PhiVanChuyen']=$itemhd['PhiVanChuyen'];
            $listhd['phantramkhuyenmai']=$itemhd['phantramkhuyenmai'];
            array_push($list, $listhd);
}
echo json_encode($list);