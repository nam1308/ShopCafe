<?php
session_start();
require './connect.php';

$masp=$_GET['masp'];
$soluong=$_GET['soluong'];
$size=$_GET['size'];

//1: them thanh cong 
//2: hang da them het
//0: da mua toi da
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
$sql="SELECT sanpham.*,Size,SoLuong,DonGia FROM sanpham INNER JOIN
ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP WHERE sanpham.MaSP='$masp' and Size=$size";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
if(intval($each['SoLuong'])==0){
    $count=countcart();
    echo json_encode([0,$count]);
    exit;
}
else{
    if(empty($_SESSION['cart'][$masp])){
        if( intval($each['SoLuong']) < intval($soluong)){
            $soluong=intval($each['SoLuong']);
        }
            $_SESSION['cart'][$masp]['TenSanPham']=$each['TenSP'];
            $_SESSION['cart'][$masp]['AnhSanPham']=$each['AnhSanPham'];
            $_SESSION['cart'][$masp]['size'][$size]['soluong']=intval($soluong);
            $_SESSION['cart'][$masp]['size'][$size]['DonGia']=$each['DonGia'];
            $_SESSION['cart'][$masp]['size'][$size]['soluongton']=$each['SoLuong'];
            $count=countcart();
        echo json_encode([1,$count]);
        exit;
    }
    else{
        
        if( empty($_SESSION['cart'][$masp]['size'][$size])){
            if(intval($soluong)>=intval($each['SoLuong'])){
                $soluong=intval($each['SoLuong']);
            }
            $_SESSION['cart'][$masp]['size'][$size]['soluong']=intval($soluong);
            $_SESSION['cart'][$masp]['size'][$size]['DonGia']=$each['DonGia'];
            $_SESSION['cart'][$masp]['size'][$size]['soluongton']=$each['SoLuong'];
            $count=countcart();
            echo json_encode([1,$count]); 
            exit;
        }
        else if(intval($_SESSION['cart'][$masp]['size'][$size]['soluong'])==intval($each['SoLuong']))
        {
            $count=countcart();
            echo json_encode([0,$count]);
            exit;
        }
        else{
            if((intval($_SESSION['cart'][$masp]['size'][$size]['soluong'])+intval($soluong))>=intval($each['SoLuong'])){
                $soluong=intval($each['SoLuong'])-intval($_SESSION['cart'][$masp]['size'][$size]['soluong']);
            }
                $_SESSION['cart'][$masp]['size'][$size]['soluong']+=intval($soluong);
                $count=countcart();
            echo json_encode([1,$count]);    
            exit; 
         }
     }
}
