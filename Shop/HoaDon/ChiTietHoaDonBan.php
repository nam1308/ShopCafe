<?php
require '../connect.php';
$mahdb=$_GET['MaHDB'];
$sql="select MaHDB,SoLuong,Size,DonGia,sanpham.TenSP,sanpham.MaSP,AnhSanPham from chitiethdb 
inner join sanpham on sanpham.MaSP=chitiethdb.MaSP where MaHDB='$mahdb'";
$result=mysqli_query($connect,$sql);
$list=[];
$listsp=[];
foreach($result as $item){
    $sql="select * from sanpham inner join ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP where sanpham.MaSP='".$item['MaSP']."'";
    $resultsp=mysqli_query($connect,$sql);
    foreach($resultsp as $itemsp){
        $listsp[$item['MaSP']][$itemsp['Size']]["DonGia"]=$itemsp['DonGia'];
        $listsp[$item['MaSP']][$itemsp['Size']]["SoLuongTon"]=$itemsp['SoLuong'];
    }
    $listhd=[];
    $listhd['MaHDB']=$item['MaHDB'];    
    $listhd['SoLuong']=$item['SoLuong'];
    $listhd['Size']=$item['Size'];
    $listhd['DonGia']=$item['DonGia'];
    $listhd['TenSP']=$item['TenSP'];
    $listhd['MaSP']=$item['MaSP'];
    $listhd['AnhSanPham']=$item['AnhSanPham'];
    array_push($list, $listhd);
}
echo json_encode([$list,$listsp]);