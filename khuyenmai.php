<?php
session_start();
require './connect.php';
$makm=$_GET['km'];
$sql="select * from khuyenmai where MaKM='$makm'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
if(isset($each)){
    $_SESSION['km']=$each ['MaKM'];
    $_SESSION['phamtramkm']=$each ['PhanTramGiam'];
    echo $each ['PhanTramGiam'];
}
else{
    $_SESSION['phamtramkm']=0;
    $_SESSION['km']='';
    echo 0;
}