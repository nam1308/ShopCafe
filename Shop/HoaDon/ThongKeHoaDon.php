<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECoffee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="./thongke.js"></script>
<style>
  .modal-dialog {
    max-width: 900px;
    margin: 1.75rem auto;
}
.edit_soluong{
  width: 100px;
}
.soluongmua{
  width: 100px;
}
.main-panel{
      padding-left: 20px;
      padding: 20px;
    }
    .size_sanpham{
      width: 70px;
    }
    #butadd{
      margin-top: 10px;
     width: 150px;
      padding: 5px 5px;
    }
</style>
</head>

<body>
<div class="wrapper ">
<?php
require '../Menu.php';
?>
<div class="main-panel">
<?php
require '../connect.php';
?>
<!-- nguoi dung -->
<table class="table container display" id="lstuser" style="width:100%">
  <thead class="thead-dark">
    <tr>
      <th style="font-size: 13px;" scope="col">MaNguoiDung</th>
      <th style="font-size: 13px;" scope="col">TenNguoiDung</th>
      <th style="font-size: 13px;" scope="col">Email</th>
      <th style="font-size: 13px;" scope="col">Số Điện Thoại</th>
      <th style="font-size: 13px;" scope="col">Địa Chỉ</th>
      <th style="font-size: 13px;" scope="col">TaiKhoan</th>
      <th style="font-size: 13px;" scope="col">Option</th>
    </tr>
  </thead>
</table>

<!-- nguoi dung -->
    <!-- Contact Start -->
    <h3 class="ml-3 mt-3">Hóa Đơn</h3>
    <table class="table container-fluid display" id="lsthoadon" style="width:100%">
  <thead class="thead-dark">
    <tr>
      <th style="font-size: 13px;" scope="col">Tên Người Nhận</th>
      <th style="font-size: 13px;" scope="col">Email</th>
      <th style="font-size: 13px;" scope="col">Số Điện Thoại</th>
      <th style="font-size: 13px;" scope="col">Địa Chỉ</th>
      <th style="font-size: 13px;" scope="col">Đơn Giá</th>
      <th style="font-size: 13px;" scope="col">Ghi Chú</th>
      <th style="font-size: 13px;" scope="col">Phương Thức Thanh Toán</th>
      <th style="font-size: 13px;" scope="col">KHuyến Mại</th>
      <th style="font-size: 13px;" scope="col">Phí Vận Chuyển</th>
      <th style="font-size: 13px;" scope="col">Ngày đặt hàng</th>
      <th style="font-size: 13px;" scope="col">Tình Trạng</th>
      <th style="font-size: 13px;" scope="col"></th>
    </tr>
  </thead>
</table>
</div>
</div>

    <!-- Contact End -->

<!-- dia log cap nhat -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="table table-bordered" id="tbchitiet" cellspacing="2">
                    <div>
                    <input type="hidden" class="inputhdb" id="mahdb" />
                        <label>Tên Nguoi nhan</label>
                        <input type="text" class="inputtk" id="tenNN" />
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" class="inputtk" id="email" />
                    </div>
                    <div>
                        <label>Số Điện Thoại</label>
                        <input type="text" class="inputtk" id="sdt" />
                    </div>
                    <div>
                        <label>Địa chỉ</label>
                        <input type="text" class="inputtk" id="diachi" />
                    </div>
                    <div>
                        <label>Đơn Giá</label>
                        <input type="text" class="inputtk" id="dongia" />
                    </div>
                    <div>
                        <label>Ghi chú</label>
                        <input type="text" class="inputtk" id="ghichu" />
                    </div>
                    <div>
                        <label>Phương thức thanh toán</label>
                        <input type="text" class="inputtk" id="pttt" />
                    </div>
                    <div>
                        <label>Khuyến mãi</label>
                        <select id="khuyenmai"class="inputtk" >
                        <option value="" data-value="0">0</option>
                        <?php
                        $sql="select * from khuyenmai";
                        $result=mysqli_query($connect,$sql);
                        foreach($result as $item){
                            ?>
                              <option value="<?=$item['MaKM']?>" data-value=<?=$item['PhanTramGiam']?>><?=$item['PhanTramGiam']?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label>Phí vận chuyển</label>
                        <input type="text" class="inputtk" id="phivanchuyen" />
                    </div>
                    <div>
                        <label>Ngày Tháng</label>
                        <input type="date" class="inputtk" id="ngaydathang" />
                    </div>
                    <div>
                        <label>Tình Trạng</label>
                        <select name="trangthai" id="trangthaiupdate">
                        <option value="0">Đang đóng gói</option>
                        <option value="1">Đang giao</option>
                        <option value="2">Đã giao xong</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="saveupdate" data-id="" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- dia log cap nhat -->
<!-- dialog chi tiet -->
<div class="modal fade" id="dialog-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dialog-detail">Chỉnh Sửa Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button type="button" data-toggle="modal" class="btn btn-primary" id="butadd" data-target="#dialog-sanpham">Thên Sản Phẩm</button>
            <div class="modal-body body-detail" id="body_detail">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- dialog chi tiet -->
<!-- dialog san pham  -->
<div class="modal fade" id="dialog-sanpham" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dialog-detail">Chỉnh Sửa Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body-detail" id="body_detail">
            <table class="table table-bordered">
                <?php
                    $sql="SELECT sanpham.*,TenHSX,TenPhanLoai from sanpham INNER JOIN hangsanxuat on hangsanxuat.MaHSX=sanpham.MaHSX 
                    INNER JOIN phanloai on phanloai.MaPhanLoai=sanpham.MaPhanLoai";
                    $kqsp=mysqli_query($connect,$sql);
                    $sql="select * from sanpham inner join ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP";
                    $resultsp=mysqli_query($connect,$sql);
                    $listsp=[];
                    foreach($kqsp as $item){
                            $listsp[$item['MaSP']]['TenSP']=$item['TenSP'];
                            $listsp[$item['MaSP']]['AnhSanPham']=$item['AnhSanPham'];
                            $listsp[$item['MaSP']]['MoTaSanPham']=$item['MoTaSanPham'];
                            $listsp[$item['MaSP']]['TenHSX']=$item['TenHSX'];
                            $listsp[$item['MaSP']]['TenPhanLoai']=$item['TenPhanLoai'];
                        foreach($resultsp as $itemct){
                            if($itemct['MaSP']==$item['MaSP']){
                                $listsp[$item['MaSP']]['Size'][$itemct['Size']]['DonGia']=$itemct['DonGia'];  
                                $listsp[$item['MaSP']]['Size'][$itemct['Size']]['SoLuong']=$itemct['SoLuong']; 
                            }
                        }
                       
                    }
                    foreach($listsp as $key=>$item){?>
                        <tr>
                            <td>
                            <img src="../../img/<?=$item['AnhSanPham']?>" class="anh" data-value="<?=$item['AnhSanPham']?>" style="width:50px">
                            </td>
                            <td class="ten">
                                <?=$item['TenSP']?>
                            </td>
                            <td>
                                <?=$item['MoTaSanPham']?>
                            </td>
                            <td>
                                 <?=$item['TenHSX']?>
                            </td>
                            <td>
                                 <?=$item['TenPhanLoai']?>
                            </td>
                            <td>
                            <input type="number" class="soluongmua" value=0>
                            </td>
                            <td>
                            <select class="size_sanpham">
                                <?php
                                foreach($item['Size'] as $size=>$itemsize){
                                ?>
                                    <option value=<?=$size?> data-dongia=<?=$itemsize['DonGia']?> data-soluongton="<?=$itemsize['SoLuong']?>"><?=$size?></option>

                                <?php }?>
                            </select>
                            </td>
                            <td class="dongia">
                                0
                            </td>
                            <td>
                            <button type="button" style="color:black;" class="btn btn-success mt-1 addsanpham" data-id="<?=$key?>">Thêm Sản Phẩm</button>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- dialog san pham -->
   
</body>
<script>
$("#hoadon").attr("class","active");
</script>
</html>