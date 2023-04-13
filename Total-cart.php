<?php
session_start();
$total=0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $itemcart){
        foreach($itemcart['size'] as $itemsize){
            $total+=intval($itemsize['DonGia'])*intval($itemsize['soluong']);
        }
    }
}
echo $total;