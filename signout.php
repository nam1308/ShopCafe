<?php
session_start();
unset($_SESSION['MaNguoiDung']);
unset($_SESSION['TenND']);
unset($_SESSION['TaiKhoan']);
setcookie('remember',null,-1);
header('location:index1.php');