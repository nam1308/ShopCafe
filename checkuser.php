<?php
session_start();
if(empty($_SESSION['MaNguoiDung'])){
    header("location:layoutlogin.php");
    exit();
}