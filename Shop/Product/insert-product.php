<?php
require '../connect.php';
$tensp=$_POST['tensp'];
$mapl=$_POST['mapl'];
$mahsx=$_POST['mahsx'];
$mota=$_POST['mota'];
if(empty($tensp)||empty($mapl)||empty($mahsx)||empty($mota)){
    header("location:addproduct.php");
    exit();
}
else{
$trangthai=0;
if(isset($_POST['TrangThai'])){
    $trangthai=1;
}
$sql="select count(*) from sanpham";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
$round=true;
$i=1;
while($round==true){
    $masp="SP".(intval($each['count(*)']+$i));   
    $sql="select count(*) from sanpham where MaSP='$masp'";
    $result=mysqli_query($connect,$sql);
    $item=mysqli_fetch_array($result);

    if($item['count(*)']==0){
        $round=false;
    }else{
        $i++;
    }
}
$rand=time();
$file=$rand.'_'.$_FILES['anhsp']['name'][0];
move_uploaded_file($_FILES['anhsp']['tmp_name'][0],"../../img/".$file);
$sql="INSERT INTO sanpham(MaSP, TenSP, TrangThai, MoTaSanPham, AnhSanPham, MaPhanLoai, MaHSX) 
VALUES ('$masp','$tensp','$trangthai','$mota','$file','$mapl','$mahsx')";
$result=mysqli_query($connect,$sql);

//echo $masp;
$photo=$_FILES['anhsp'];
print_r($_FILES);
// if($_FILES['anhsp']['size'][0]!=0){
    foreach($_FILES['anhsp']['name'] as $key=> $val){
        if($key!=0){
             $rand=time();
            $file=$rand.$key.'_'.$val;
            move_uploaded_file($_FILES['anhsp']['tmp_name'][$key],"../../img/".$file);
        }
        $stt=$key+1;
        $sql="INSERT INTO anhsp(MaSP, TenAnh, stt) VALUES ('$masp','$file','$stt')";
        $result=mysqli_query($connect,$sql);
            echo "<br>";
            print_r($key);
            echo "<br>";
            print_r($val);
}

  header("location:add-detail-product.php?MaSP=$masp&TenSP=$tensp");
  exit();  
}
