<?php
require '../connect.php';
$mahdb=$_POST['mahdb'];
$tennn=$_POST['tennn'];
$email=$_POST['email'];
$sdt=$_POST['sdt'];
$pttt=$_POST['pttt'];
$dongia=$_POST['dongia'];
$ghichu=$_POST['ghichu'];
$diachi=$_POST['diachi'];
$phivanchuyen=$_POST['phivanchuyen'];
$ngaydathang=$_POST['ngaydathang'];
$khuyenmai=$_POST['khuyenmai'];
$trangthai=$_POST['trangthai'];
$phantramkhuyenmai=$_POST['phantramkhuyenmai'];
$dongia=intval($dongia)-((intval($phantramkhuyenmai)*intval($dongia))/100);
$data=[
    "mahdb"=>$mahdb,
    "tennn"=>$tennn,
    "pttt"=>$pttt,
    "email"=>$email,
    "sdt"=>$sdt,
    "ghichu"=>$ghichu,
    "dongia"=>$dongia
    ,"diachi"=>$diachi,
    "phivanchuyen"=>$phivanchuyen,
    "ngaydathang"=>$ngaydathang,
    "khuyenmai"=>$khuyenmai,
    "trangthai"=>$trangthai,
    "phantramkhuyenmai"=>$phantramkhuyenmai
];
$sql="UPDATE hoadonban SET MaKM=".(empty($khuyenmai)?"NULL":"'$khuyenmai'").",NgayDatHang='$ngaydathang',DiaChiDatHang='$diachi',
TinhTrang=".intval($trangthai).",PTThanhToan='$pttt',GhiChu='$ghichu',DonGia=$dongia,
TenNguoiNhan='$tennn',Email='$email',SDT='$sdt',PhiVanChuyen=$phivanchuyen WHERE MaHDB='$mahdb'";
mysqli_query($connect,$sql);
echo json_encode($data);