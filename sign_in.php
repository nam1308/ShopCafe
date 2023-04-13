<?php
require './connect.php';
$username=$_POST['username'];
$pass=$_POST['password'];
$remember=false;
$errorUsername='';
$errorPass='';
if($username=='' || $pass==''){
    header("location:layoutlogin.php?".($username==''?'errorUserName=Bạn cần điền usernam&':'').($pass==''?'errorPass=Bạn cần điền password':''));
    exit();
}
if(isset($_POST['remember'])){
    $remember=true;
  }
$sql="select * from nguoidung where MatKhau='$pass' and TaiKhoan='$username'";
$result=mysqli_query($connect,$sql);
$number_rows=mysqli_num_rows($result);
if($number_rows>0){
    $each=mysqli_fetch_array($result);
    session_start();
    $mnd=$each['MaNguoiDung'];
    $_SESSION['MaNguoiDung']=$each['MaNguoiDung'];
    $_SESSION['TenND']=$each['TenNguoiDung'];
    $_SESSION['TaiKhoan']=$each['TaiKhoan'];
    if($remember==true){
        $token=uniqid('user_',true);
        $sql="update nguoidung set token='$token' where MaNguoiDung='$mnd'";
        $result=mysqli_query($connect,$sql);
        setcookie('remember',$token,time()+60*60*30);
    }
   
    header("location:index1.php?succes=thanhcong");
    exit();
}
header("location:layoutlogin.php?error=Vui lòng nhập lại có thể bạn đã nhập sai mật khẩu hoặc password");