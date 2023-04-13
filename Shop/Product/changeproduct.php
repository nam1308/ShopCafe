<?php
require '../connect.php';
$masp=$_POST['masp'];
$tensp=$_POST['tensp'];
$mapl=$_POST['mapl'];
$mahsx=$_POST['mahsx'];
$mota=$_POST['mota'];
$trangthai=false;
// foreach($_FILES as $key=>$item){
//     print_r($key);
//     echo "<br>";
// }
// print_r($_FILES);
if(isset($_POST['trangthai'])){
    $trangthai=true;
  }
  $file_name='';
  $anhtrinh=false;
  if($_FILES['anhsp1']['size']!=0){
        $folder='../../img/';
  $file_extension=explode('.',$_FILES['anhsp1']['name'])[1];
  $file_name=time().'0'.'.'.$file_extension;
  $path_file=$folder.$file_name;
  $anhtrinh=true;
  move_uploaded_file($_FILES['anhsp1']["tmp_name"],$path_file);
  }

  $sql="UPDATE sanpham SET TenSP='$tensp',TrangThai=".($trangthai?1:0)."
,MoTaSanPham='$mota'".(!empty($file_name)?",AnhSanPham='".$file_name."'":'')."
,MaPhanLoai='$mapl',MaHSX='$mahsx' WHERE MaSP='$masp'";
//print_r($_FILES);
$result=mysqli_query($connect,$sql);

echo $sql;
$i=0;
foreach($_POST['stt'] as $item){
        $ma='anhsp'.$item;
    if($anhtrinh && $item==1){
        $sql="UPDATE anhsp SET TenAnh='".$file_name."' WHERE MaSP='$masp' and stt=$item";
        $result=mysqli_query($connect,$sql);
        $anhtrinh=false;
        continue;
    }    
    if($_FILES[$ma]['size']!=0){
        $i++;
    $folder='../../img/';
    $file_extension=explode('.',$_FILES[$ma]['name'])[1];
    $file_name=time().$i.'.'.$file_extension;
    $path_file=$folder.$file_name;
    move_uploaded_file($_FILES[$ma]["tmp_name"],$path_file);
        $sql="UPDATE anhsp SET TenAnh='".$file_name."' WHERE MaSP='$masp' and stt=$item";
        $result=mysqli_query($connect,$sql);
        echo "<br>";
     echo  $sql;
    }
    
   
}
header("location:admin.php");
exit();