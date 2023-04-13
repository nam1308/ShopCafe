<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<head>
    <meta charset="utf-8">
    <title>ECoffee - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->

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
    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Coffee</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
              
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php if(isset($_SESSION['cart'])){
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
                    }?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">

            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Coffee</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index1.php" class="nav-item nav-link active">Trang Chủ</a>
                            <a href="shop.php" class="nav-item nav-link">Sản Phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Giỏ Hàng</a>
                                    <a href="HoaDonNguoiDung.php" class="dropdown-item">Đơn hàng</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Liên Hệ Cửa Hàng</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            if(empty($_SESSION['MaNguoiDung'])){
                                echo '<a href="/Coffee/layoutlogin.php" class="nav-item nav-link">Đăng Nhập</a>';
                            }else{
                                echo '<a href="/Coffee/signout.php" class="nav-item nav-link">Đăng Xuất</a>';
                            }
                            
                            ?>
                            <a href="" class="nav-item nav-link">Đăng Kí</a>
                            <?php
                            if(!empty($_SESSION['MaNguoiDung']))
                             if($_SESSION['Role']==1){
                                echo '<a href="./Shop/Product/admin.php" class="nav-item nav-link">Quản Lý</a>';
                            }
                            
                            ?>
                        </div>

                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/150929101049-black-coffee-stock-super-tease.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">100% Tự Nhiên</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Cafe Đen</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/cup-of-coffee-royalty-free-image-1581611460.webp" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">100% Nguyên Chất</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php
                require './connect.php';
                $sql="SELECT phanloai.*,COUNT(MaSP) as sosanpham from phanloai INNER JOIN sanpham on sanpham.MaPhanLoai=phanloai.MaPhanLoai GROUP BY phanloai.MaPhanLoai";
                $result=mysqli_query($connect,$sql);
                $listcategory=[];
                foreach($result as $item){?>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <p class="text-right"><?=$item['sosanpham']?> Sản Phẩm</p>
                            <a href="shop.php?MaPhanLoai=<?=$item['MaPhanLoai']?>" style="width: 300px;" class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" style="height:200px" src="img/<?=$item['AnhPL']?>" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0"><?=$item['TenPhanLoai']?></h5>
                        </div>
                    </div>
                <?php        
                    }
                ?>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-12 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/amicatno.webp" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Cà Phê Nhập Khẩu</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">New Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        <?php
    $sql="SELECT * FROM sanpham ORDER BY NgayThem ASC LIMIT 4";
    $resultnew=mysqli_query($connect,$sql);
    foreach($resultnew as $item){
        ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/<?=$item['AnhSanPham']?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?=$item['TenSP']?></h6>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?MaSanPham=<?=$item['MaSP']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>
                </div>
            </div>
       <?php } ?> 

        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->





    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <?php 
                    $sql="select * from hangsanxuat";
                    $result=mysqli_query($connect,$sql);
                    foreach($result as $item){?>
                    <div class="vendor-item border p-4">
                        <img src="img/<?=$item['AnhHSX']?>" alt="">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Vendor End -->


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
    <script>
        var a='<?php echo $_SESSION['TaiKhoan'];?>';
        console.log(a)
    </script>
</body>

</html>
