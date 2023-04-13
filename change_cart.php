<?php
session_start();
require './connect.php';
$masp=$_GET['masp'];
$soluong=$_GET['soluong'];
$size=$_GET['size'];
function countcart(){
    if(isset($_SESSION['cart'])){
        $count=0;
        foreach($_SESSION['cart'] as $itemcart){
            foreach($itemcart['size'] as $itemsize){
                $count+=$itemsize['soluong'];
            }
        }
        return $count;
    }
    else{
        return 0;
    }
}
    if(intval($soluong)==0){
        unset($_SESSION['cart'][$masp]['size'][$size]);
      
        if(count($_SESSION['cart'][$masp]['size'])==0){
            unset($_SESSION['cart'][$masp]);
        }
        $count=countcart();
        echo json_encode([0,$count]);
    }
    else{
        $_SESSION['cart'][$masp]['size'][$size]['soluong']=intval($soluong);
        $count=countcart();
        echo json_encode([1,$count]);
    }
    

     