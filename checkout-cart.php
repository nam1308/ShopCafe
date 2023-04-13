<?php
session_start();
require './connect.php';
$tenkh=$_POST['TenKhachHang'];
$email=$_POST['email'];
$sdt=$_POST['SDT'];
$address=$_POST['address'];
$quocgia=$_POST['quocgia'];
//$thanhpho=$_POST['thanhpho'];
$pttt=$_POST['PTTT'];
$ghichu=$_POST['ghichu'];
$ship=$_POST['ship'];
$sql="select count(*) from hoadonban";
$result=mysqli_query($connect,$sql);
$count=mysqli_fetch_array($result)['count(*)'];
$round=true;
$i=1;
while($round==true){
    $mahd="HD".(intval($count+$i));   
    $sql="select count(*) from hoadonban where MaHDB='$mahd'";
    $result_count=mysqli_query($connect,$sql);
    $item_count=mysqli_fetch_array($result_count);

    if($item_count['count(*)']==0){
        $round=false;
    }else{
        $i++;
    }
}
//echo $mahd;
if(isset($_SESSION['cart'])){
$makm='';
if(isset($_SESSION['km'])){
    $makm=$_SESSION['km'];
}
$total=0;

    foreach($_SESSION['cart'] as $itemcart){
        foreach($itemcart['size'] as $itemsize){
            $total+=intval($itemsize['DonGia'])*intval($itemsize['soluong']);
        }
    }

$diachi=$address.'/'.$quocgia;
$sql="INSERT INTO hoadonban(MaHDB, MaKM, DiaChiDatHang, TinhTrang, PTThanhToan, 
GhiChu, MaNguoiDung, DonGia, TenNguoiNhan, Email, SDT,PhiVanChuyen) 
VALUES ('$mahd','$makm','$diachi',0,'$pttt','$ghichu','ND1',$total,'$tenkh','$email','$sdt',$ship)";
echo'<br> insedt hoa don ban'.$sql;
mysqli_query($connect,$sql);
foreach($_SESSION['cart'] as $ma=>$itemcart){
  foreach($itemcart['size'] as $size=>$itemsize){
      $dongia=$itemsize["DonGia"];
      $soluong=$itemsize['soluong'];
      $sql="select * from ct_sanpham where masp='$ma' and size=$size";
      echo '<br> get so luong ton '.$sql;
      $result=mysqli_query($connect,$sql);
      $each=mysqli_fetch_array($result);
      $soluongton=intval($each['SoLuong'])-intval($soluong);
      $sql="UPDATE ct_sanpham SET SoLuong=$soluongton WHERE masp='$ma' and size=$size";
      echo "<br> update chi tiet sp la: ".$sql;
      mysqli_query($connect,$sql);
        $sql="INSERT INTO chitiethdb(MaHDB, MaSP, DonGia, SoLuong, Size)
         VALUES ('$mahd','$ma',$dongia,$soluong,$size)";
         echo "<br> insert chi tiet la: ".$sql;
         mysqli_query($connect,$sql);
  }
}
}
unset($_SESSION['cart']);
unset($_SESSION['km']);
unset($_SESSION['phamtramkm']);
mysqli_close($connect);
header("location:shop.php");