<?php
if($_SERVER['REQUEST_METHOD']=='PUT'){
$putfp = fopen('php://input', 'r');
$putdata = '';
while($data = fread($putfp, 1024))
    $putdata .= $data;
fclose($putfp);
$data=json_decode($putdata);

require '../connect.php';
$sql="select * from ct_sanpham where Size='$data->size' and MaSP='$data->masp'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
$soluong=intval($data->soluong);
$soluongton=intval($each['SoLuong'])+intval($data->soluongcu);
if($soluongton<intval($data->soluong)){
$soluong=$soluongton;
}
$sldu=$soluongton-$soluong;
$sql="update chitiethdb set SoLuong=$soluong where MaHDB='$data->mahdb' and Size='$data->size' and MaSP='$data->masp'";
$result=mysqli_query($connect,$sql);
$sql="update ct_sanpham set SoLuong=$sldu where Size='$data->size' and MaSP='$data->masp'";
$result=mysqli_query($connect,$sql);
$newdata=[
    "masp"=>$data->masp,
    "size"=>$data->size,
    "soluong"=>$soluong,
    "soluongcu"=>$data->soluongcu
];
echo json_encode($newdata);
}
else{
    echo json_encode("khong co request");
}












