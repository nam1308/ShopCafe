<?php
session_start();
if(empty($_SESSION['MaNguoiDung'])){
    header("location:layoutlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ECoffee - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .label_hethang{
            position: absolute;
    top: 9px;
    left: 10px;
    padding: 5px;
    background-color: #9e9e9e;
    color:white !important;
    border-radius: 2px;
    font-size: 13px;
    z-index: 10;
        }
        table,.btn{
           font-size: 12px; 
        }
    </style>
</head>
<body>
 <?php
    require './Menu.php';
    ?>
     <!-- Page Header Start -->
     <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Hóa Đơn</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <table class="table container">
    <thead class="thead-dark">
      <tr>
        <th scope="col"></th>
        <th scope="col">Tên Người Nhận</th>
        <th scope="col">Email</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Ngày Đặt Hàng</th>
        <th scope="col">Số Lượng</th>
        <th scope="col">Đơn Giá</th>
        <th scope="col">Phí Vận Chuyển</th>
        <th scope="col">Tình Trạng</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

    <?php
    require './connect.php';
    $i=0;
    $sql="SELECT hoadonban.*,COUNT(SoLuong) as soluong from hoadonban INNER JOIN chitiethdb on hoadonban.MaHDB= chitiethdb.MaHDB 
    WHERE MaNguoiDung='".$_SESSION['MaNguoiDung']."' GROUP BY hoadonban.MaHDB";
    $result=mysqli_query($connect,$sql);
    foreach($result as $item){
        $i++;
 ?>

    <tr>
        <td scope="col"><?=$i?></td>
        <td scope="col"><?=$item['TenNguoiNhan']?></td>
        <td scope="col"><?=$item['Email']?></td>
        <td scope="col"><?=$item['DiaChiDatHang']?></td>
        <td scope="col"><?=$item['NgayDatHang']?></td>
        <td scope="col"><?=$item['soluong']?></td>
        <td scope="col"><?=$item['DonGia']?></td>
        <td scope="col"><?=$item['PhiVanChuyen']?></td>
        <td scope="col"><?php
            echo intval($item['TinhTrang'])==0?"Đang Đóng Gói":(intval($item['TinhTrang'])==1?"Đang Giao":"Đã Giao");
        ?></td>
        <td>
        <button type="button" class="btn btn-warning chitiet" data-id=<?=$item['MaHDB']?> data-toggle="modal" data-target="#exampleModal">Chi Tiết</button>
        </td>
    </tr>
 

<?php
    }
?>
  </tbody>
</table> 
<!-- dialog chi tiet -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table container">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Tên Sản Phẩm</th>
        <th scope="col">Size</th>
        <th scope="col">Số Lượng</th>
        <th scope="col">Đơn Giá</th>
        <th scope="col">Tổng Tiền</th>
      </tr>
    </thead>
    <tbody id="bodydetail">
    </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  
<!-- dialog chi tiet --> 
<?php
    require './Footer.php';
?>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="./pagination.js"></script>

<script>
$(".chitiet").click(function(){
    let mahdb=$(this).attr("data-id");
    $.ajax({
            url: `chitiethoadonnguoidung.php?mahdb=${mahdb}`,
            method: 'GET',
            success: function (response) {
                response=JSON.parse(response);
                let innettext='';
                response.forEach((product)=>{
                        innettext+=` <tr>
                                        <th scope="col">${product.TenSP}</th>
                                        <th scope="col">${product.Size}</th>
                                        <th scope="col">${product.SoLuong}</th>
                                        <th scope="col">${product.DonGia}</th>
                                        <th scope="col">${product.DonGia*product.SoLuong}</th>
                                    </tr>`
                })
                $("#bodydetail").empty();
                document.getElementById('bodydetail').innerHTML=innettext;
            }
        })
})
</script>
</body>

</html>