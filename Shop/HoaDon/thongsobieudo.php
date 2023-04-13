<?php
require '../connect.php';
// $begin='2022-01-29';
// $end='2022-05-30';
$begin=$_GET['begin'];
$end=$_GET['end'];
$sql="select IFNULL(hoadon.NgayDatHang ,0)as NgayDatHang,sanpham.MaSP,sanpham.TenSP,IFNULL(sum(SoLuong) ,0) as soluong 
from (select chitiethdb.*,NgayDatHang from chitiethdb JOIN hoadonban on hoadonban.MaHDB=chitiethdb.MaHDB 
where NgayDatHang > '$begin' and NgayDatHang < '$end') as hoadon 
 RIGHT JOIN sanpham on sanpham.MaSP=hoadon.MaSP group BY sanpham.MaSP,hoadon.NgayDatHang";
$result=mysqli_query($connect,$sql);
$listsp=[];
$i=0;
$itemsp=[];
foreach($result as $item){ 
    if(empty($itemsp[$item['MaSP']])){
        $itemsp[$item['MaSP']]=[
            'name'=>$item['TenSP'],
             'y'=>intval($item['soluong']),
            'drilldown'=>$item['TenSP']
        ];
    }
    else{
        $itemsp[$item['MaSP']]['y']+=$item['soluong'];
    }

}

$arr=[];
$period = new DatePeriod(
    new DateTime($begin),
    new DateInterval('P1D'),
    new DateTime($end)
);
foreach($result as $item){ 
    $arr[$item['MaSP']]=[
        'name'=>$item['TenSP'],
        'id'=>$item['TenSP'],
        'data'=>[]
    ];
foreach ($period as $key => $value) {
   
  $arr[$item['MaSP']]['data'][$value->format('Y-m-d')]=[
    $value->format('Y-m-d'),
    0
  ];
}

}
foreach($result as $item){
    $arr[$item['MaSP']]['data'][$item['NgayDatHang']]=[
        $item['NgayDatHang'],
        intval($item['soluong'])
    ];
}

echo json_encode([$itemsp,$arr]);
