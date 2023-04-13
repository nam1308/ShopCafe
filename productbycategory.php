<?php


$price='4000.000đ - 5000.000đ';
$array=explode('-',$price);
foreach($array as $item){
    $item=trim($item);
  $item=str_replace("đ","",$item);
  $item=intval(str_replace(".","",$item));
  var_dump($item);
}
