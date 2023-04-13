<?php
require './checkuser.php';
require './connect.php';
$manguoidung=$_SESSION['MaNguoiDung'];
$sql="select * from nguoidung where MaNguoiDung='$manguoidung'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
require './Menu.php';
?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
<!-- ./checkout-cart.php" -->

    <!-- Checkout Start -->
    <form class="container-fluid pt-5" action="checkout-cart.php" method="POST">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" name="TenKhachHang" placeholder="John" value="<?=$each['TenNguoiDung']?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com" value="<?=$each['Email']?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" type="text" name="SDT" placeholder="+123 456 789" value="<?=$each['SoDienThoai']?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Đia Chỉ</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street" value="<?=$each['DiaChi']?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quốc Gia</label>
                            <select class="custom-select" name="quocgia">
                                <option selected>Viêt Nam</option>
                                <option>Thái Lan</option>
                                <option>Mỹ</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-6 form-group">
                            <label>Thành Phố</label>
                            <input class="form-control" type="text" name="thanhpho" placeholder="New York">
                        </div> -->
                        <div class="col-md-12 form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" type="text" name="ghichu" placeholder="Ghi Chu"></textarea>
                        </div>
                    </div>
                </div>
          
            </div>
            <div class="col-lg-12">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <div class="d-flex justify-content-between">
                            <p>Số Sản Phẩm</p>
                            <p id="soluongsp">
                        <?php
                            if(isset($_SESSION['cart'])){
                                $count=0;
                                foreach($_SESSION['cart'] as $itemcart){
                                    foreach($itemcart['size'] as $itemsize){
                                        $count+=$itemsize['soluong'];
                                    }
                                }
                                echo $count;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Giá Đơn Hàng</p>
                            <p id="dongia"><?php
                             $total=0;
                            if(isset($_SESSION['cart'])){
                               
                                foreach($_SESSION['cart'] as $itemcart){
                                    foreach($itemcart['size'] as $itemsize){
                                        $total+=intval($itemsize['DonGia'])*intval($itemsize['soluong']);
                                    }
                                }
                                echo $total;
                            }
                            else{
                                echo $total;
                            }
                        ?>đ</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Khuyến Mại</p>
                            <p id="khuyenmai"><?php
                            $khuyenmai=0;
                            if(isset($_SESSION['phamtramkm'])){
                                $khuyenmai=(floatval($_SESSION['phamtramkm'])/100)*floatval($total);
                                echo $khuyenmai;
                            }
                            else{
                                echo $khuyenmai;
                            }
                        ?>đ</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Phí Vận Chuyển</p>
                            <input type="hidden" name="ship" value="<?php
                                $ship=0;
                                    if($total>4000000){
                                        echo 0;
                                    }
                                    else{
                                        $ship=20000;
                                        echo $ship;
                                    }
                                ?>">
                            <p id="ship">
                                <?php
                                        echo $ship;
                                ?>đ</p>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Giá Trị Đơn Hàng</h5>
                            <h5 class="font-weight-bold"><?php
                           $totalFinal=$total-$khuyenmai+$ship;
                           echo $totalFinal;    
                        ?>đ</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                   
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương Thưc Thanh Toán</h4>
                    </div>
                    <select name="PTTT" id="pttt" class="card-body mt-4" style="box-sizing: border-box;padding:10px;">
                        <option class="form-group">Qua Ngân Hàng</option>
                        <option class="form-group">Trực Tiếp</option>
                    </select>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


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
</body>
<script>
     function khuyenmai(){
        $.ajax({
            url: "/Coffee/khuyenmai.php?km="+$("#inputkm").val().trim(),
            method: 'GET',
            success: function (response) {
                let total_price=parseInt($("#price-total").text().replace("đ",""));
                let giam=(parseInt(response)/100)*total_price
                $("#khuyenmai").text(giam+'đ')
                countTotal()
            }})
    }
    function countTotal(){
        $.ajax({
            url: "/Coffee/Total-cart.php",
            method: 'GET',
            success: function (response) {
                $("#price-total").text(response+'đ')
                let ship=$("#ship").text().replace("đ","");
                let km=$("#khuyenmai").text().replace("đ","");
                let total=parseInt(response)+parseInt(ship)-parseInt(km);
                $("#total_final").text(total+'đ')
            }})
    }

</script>
</html>