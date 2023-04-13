<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard Dark Edition by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            display: block;
        }
        
        h3 {
            margin: 0 auto;
            width: 100%;
            margin-top: 0px;
        }
        
        .showlist>a {
            background-color: transparent;
            border: none;
            text-decoration: none;
        }
        
        .showlist {
            margin: 0;
            margin-top: 10px;
        }
        td{
            align-items: center;
            
        }
        .navbarh {
            height: 100vh;
            position: relative;
        }
        
        .dangxuat {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
        
        .dangxuat>a {
            text-decoration: none;
        }
        
        .user-account {
            display: flex;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
            justify-content: space-between;
            align-items: center;
        }
        
        .anh {
            padding: 0;
            display: block;
            overflow: hidden;
            height: 30px !important;
            width: 30px !important;
            border-radius: 50%;
        }
        
        .name-user {
            flex: 1;
            display: block;
            font-size: .9rem;
        }
        
        .list_select {
            margin-left: 20px;
        }
        
        .list_select>ul>li {
            list-style: none;
            color: white;
            cursor: pointer;
        }
        
        .list_select>ul>li:hover {
            color: #7e5e00;
        }
        
        .show>ul>li {
            color: #ffc107;
        }
        
        .select {
            color: #ffc107;
            font-weight: 600;
        }
        
        a:hover {
            color: #ffc107;
        }
        
        .select.collapsed {
            color: white !important;
        }
        
        .table.show {
            width: 100% !important;
            margin: 0;
            padding: 0;
        }
        .but{
            width: 100%;
    align-items: center;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    flex-direction: column;
        }
        .modal-dialog {
            max-width: 100%;
            margin: 1.75rem auto;
        }
        .main-panel{
          padding-left: 10px;
          padding-right: 10px;
        }
        .btn{
          padding:12px 0px;
        }
    </style>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
        <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.php">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.php">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.php">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
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
      <th></th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td style="font-size: 13px;" scope="col">MaNguoiDung</td>
      <td style="font-size: 13px;" scope="col">TenNguoiDung</td>
      <td style="font-size: 13px;" scope="col">Email</td>
      <td style="font-size: 13px;" scope="col">Số Điện Thoại</td>
      <td style="font-size: 13px;" scope="col">Địa Chỉ</td>
      <td style="font-size: 13px;" scope="col">TaiKhoan</td>
      <td style="font-size: 13px;" scope="col">Option</td>
      <td>
        <div class="d-flex flex-column">
        <button type="button" style="font-size:10px;" class="btn btn-warning mt-1 showhd" data-id="${row.MaNguoiDung}">Hoa Don</button>
        <button type="button" style="font-size:10px;" class="btn btn-success mt-1 update" data-id="${row.MaNguoiDung}">Chỉnh Sửa</button>
        </div>
      </td>
    </tr>
  </tbody>
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
      <th></th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td style="font-size: 13px;" scope="col">Tên Người Nhận</td>
      <td style="font-size: 13px;" scope="col">Email</td>
      <td style="font-size: 13px;" scope="col">Số Điện Thoại</td>
      <td style="font-size: 13px;" scope="col">Địa Chỉ</td>
      <td style="font-size: 13px;" scope="col">Đơn Giá</td>
      <td style="font-size: 13px;" scope="col">Ghi Chú</td>
      <td style="font-size: 13px;" scope="col">Phương Thức Thanh Toán</td>
      <td style="font-size: 13px;" scope="col">KHuyến Mại</td>
      <td style="font-size: 13px;" scope="col">Phí Vận Chuyển</td>
      <td style="font-size: 13px;" scope="col">Ngày đặt hàng</td>
      <td style="font-size: 13px;" scope="col">Tình Trạng</td>
      <td>
        <div class="d-flex flex-column">
        <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-warning mt-1 update" data-id="${row.MaHDB}" data-toggle="modal" data-target="#exampleModal">Cập Nhật</button>
        <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-success mt-1 delete" data-id="${row.MaHDB}">Hủy</button>
        <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-success mt-1 detail" data-id="${row.MaHDB}" data-toggle="modal" data-target="#dialog-detail">Chi Tiết</button></td>
      </div>
    </tr>
  </tbody>
</table>


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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <button type="button" data-toggle="modal" data-target="#dialog-sanpham">Thên Sản Phẩm</button>
            <div class="modal-body body-detail" id="body_detail">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- dialog chi tiet -->
<!-- dialog san pham  -->
<div class="modal fade" id="dialog-sanpham" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    require './connect.php';
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
                            <img src="./img/<?=$item['AnhSanPham']?>" class="anh" data-value="<?=$item['AnhSanPham']?>" style="width:50px">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- dialog san pham -->
    </div>
  </div>
 
</body>

</html>