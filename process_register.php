<?php
require './connect.php';
$name= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$address=$_POST['address'];
$birth=$_POST['birth'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$account=$_POST['account'];
$name_error='';
$address_error='';
$phone_error='';
$birth_error='';
$sex_error='';
$email_error='';
$password_error='';
$account_error='';
$check=false;
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $check=true;
   $email_error='Nhập sai định dạng';
}
if (!filter_var($sex, FILTER_VALIDATE_INT)){
    $check=true;
    $sex_error='Nhập giới tính';
}
if (empty(trim($name))){
    $check=true;
    $name_error='Vui Lòng Nhập Tên Người Dùng';
}
$sql="select count(*) from nguoidung where TaiKhoan='$account'";
$number=mysqli_fetch_array(mysqli_query($connect,$sql))['count(*)'];
if($number>=1){
    $check=true;
    $account_error='Tài khoản đã tồn tại';
}
if (empty(trim($account)) || strlen($account)<6){
    $check=true;
    $account_error='Nhập Tối Thiểu 6 Ký Tự';
}
if (empty(trim($address))){
    $check=true;
    $address_error='Vui Lòng Nhập Địa Chỉ';
}
if(!filter_var($phone, FILTER_VALIDATE_FLOAT)){
    $check=true;
    $phone_error='Vui Lòng Nhập Số Điện Thoại';
}
if(DateTime::createFromFormat('Y-m-d', $birth) == false){
    $check=true;
    $birth_error='Vui Lòng Nhập Ngày Sinh';
}
$patten='~^(?=[A-Z].*[A-Z])';
$password = $_POST['password'];
$number = preg_match('@[0-9]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    $check=true;
    $password_error='Nhập lại mật khẩu,mật khẩu chưa đủ mạnh';
  }


 if($check){
    function httpPost($url, $data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        echo $response;
    }
    $data = [
        'name_error'=>$name_error,
        'name'=>$name,
        'address_error'=>$address_error,
        'address'=>$address,
        'birth_error'=>$birth_error,
        'birth'=>$birth,
        'sex_error'=>$sex_error,
        'sex'=>$sex,
        'email_error'=>$email_error,
        'email'=>$email,
        'phone_error'=>$phone_error,
        'phone'=>$phone,
        'account_error'=>$account_error,
        'account'=>$account,
        'password_error'=>$password_error
    ];
   httpPost('http://localhost/Coffee/register.php', $data);
exit();
 }
 else{
    $sql="select count(*) from nguoidung";
    $number=mysqli_fetch_array(mysqli_query($connect,$sql))['count(*)'];
     $round=true;
    $i=1;
    while($round==true){
        $mand="ND".(intval($number+$i));   
        $sql="select count(*) from nguoidung where MaNguoiDung='$mand'";
        $result=mysqli_query($connect,$sql);
        $item=mysqli_fetch_array($result);
    
        if($item['count(*)']==0){
            $round=false;
        }else{
            $i++;
        }
    }
     $sql="INSERT INTO nguoidung(MaNguoiDung,TenNguoiDung, SoDienThoai, DiaChi, Email, TaiKhoan, MatKhau, TrangThai, GioiTinh) 
     VALUES ('$mand','$name','$phone','$address','$email','$account','$password',1,$sex)";
     echo $sql;
     mysqli_query($connect,$sql);
     header("location:layoutlogin.php");
     exit();
 }

