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
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <style>
    #tbchitiet{
        padding-left:20px;
    }
    .inputtk {
        display: block;
        margin-left: 30px;
        margin-bottom: 10px;
        width: 400px;
        border: 1px solid;
        /* border-radius: 48px; */
        outline: none;
        /* overflow: hidden; */
    }
</style>
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
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
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
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link active">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="" class="nav-item nav-link">Login</a>
                            <a href="" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Update San Pham</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <?php
    require '../../connect.php';
    $masp=$_GET['MaSP'];
    $sql="select sanpham.*,Size,SoLuong,DonGia from sanpham left join ct_sanpham on sanpham.MaSP=ct_sanpham.MaSP where sanpham.MaSP='$masp'";
    $result=mysqli_query($connect,$sql);
    $each=mysqli_fetch_array($result);
    ?>
    <div class="container-fluid pt-5">
    <form action="changeproduct.php" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="masp" value="<?=$each['MaSP']?>">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Tên san pham</label>
        <input type="text" class="form-control" id="inputEmail4" name="tensp" placeholder="Ten san pham" value="<?=$each['TenSP']?>">
        <!-- <label for="inputEmail4" class="mt-3">Ảnh chính Sản Phẩm</label>
        <div class="d-flex"><input type="file" class="form-control" name="anhsp'.$item['stt'].'" id="anhsp" placeholder="file" value="<?=$each['AnhSanPham']?>">
        <img style="width:50px;" src="img/<?=$each['AnhSanPham']?>"/></div> -->
        </div>
        <div class="form-group col-md-6">
        <label for="anhsp">Anh san pham</label>
        <?php
        $sql="select * from anhsp where MaSP='$masp'";
        $resulta=mysqli_query($connect,$sql);
        foreach($resulta as $item){
            echo '<input type="hidden" class="form-control" name="stt[]" value="'.$item['stt'].'">
            <div class="d-flex"><input type="file" class="form-control file-img mt-1" name="anhsp'.$item['stt'].'" id="anhsp" placeholder="file" value="'.$item['TenAnh'].'">
            <img style="width:50px; height:50px;" src="../../img/'.$item['TenAnh'].'"/></div>';
        }
        ?>
        </div>
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="phanloai">Phan Loai</label>
        <select id="phanloai" name="mapl" class="form-control">
            <?php
            $sql="SELECT * FROM phanloai";
            $phanloai=mysqli_query($connect,$sql);
            foreach($phanloai as $item){
                echo '<option '.($item['MaPhanLoai']==$each['MaPhanLoai']?"selected":'').' value="'.$item['MaPhanLoai'].'"'.'>'.$item['TenPhanLoai'].'</option>';
            }
           
            ?>
        </select>
        </div>
        <div class="form-group col-md-4">
        <label for="hangsx">hang san xuat</label>
        <select id="hangsx" name="mahsx" class="form-control">
        <?php
            $sql="SELECT * FROM hangsanxuat";
            $hangsanxuat=mysqli_query($connect,$sql);
            foreach($hangsanxuat as $item){
                echo '<option '.($item['MaHSX']==$each['MaHSX']?"selected":'').' value="'.$item['MaHSX'].'">'.$item['TenHSX'].'</option>';
            }
           
            ?>
        </select>
        </div>
    </div>
    <div class="form-group">
        <label for="ghichu">Mo ta</label>
        <textarea class="form-control" name="mota" id="ghichu" placeholder="Mo ta"><?=$each['MoTaSanPham']?></textarea>
    </div>
    <div class="form-group d-flex">
        <div class="form-check w-100">
        <input class="form-check-input" type="checkbox" name="trangthai" id="trangthai" <?php if(intval($each['TrangThai'])==1)echo'checked'?>>
        <label class="form-check-label" for="trangthai">
            Trang thai
        </label>
        </div>
        <div class="form-group col-md-4">
        <label for="selecsize">Loại Sản Phẩm</label>
        <select id="selecsize" class="form-control">
        <?php
            foreach($result as $item){
                echo '<option value="'.$item['Size'].'" data-id="'.$item['MaSP'].'"> Túi '.$item['Size'].'g</option>';
            }
           
            ?>
        </select>
        <button type="button" data-id="<?=$each['MaSP']?>" id="updatedetail"  class="btn btn-primary butchitiet mt-1" data-toggle="modal" data-target="#exampleModal">
                            Chỉnh sửa
                        </button>
        <button type="button" id="updatedetail"  class="btn btn-primary butchitiet mt-1">
            <a href="add-detail-product.php?MaSP=<?=$each['MaSP']?>&TenSP=<?=$each['TenSP']?>">Thêm</a>
        </button>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

    <!-- Contact End -->
<!-- dialog chi tiet -->
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
                        <label>Tên Sản Phẩm</label>
                        <input type="text" class="inputtk" disabled id="tensp" />
                    </div>
                    <div>
                        <label>Size</label>
                        <input type="text" class="inputtk" id="size" />
                    </div>
                    <div>
                        <label>So Luong</label>
                        <input type="text" class="inputtk" id="soluong" />
                    </div>
                    <div>
                        <label>Đơn Giá</label>
                        <input type="text" class="inputtk" id="dongia" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="saveupdate" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- dialog chi tiet -->
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Coffee</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../mail/jqBootstrapValidation.min.js"></script>
    <script src="../../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</body>
<script>
    $("#updatedetail").click(function(){
        let masp=$(this).attr('data-id');
        let size=parseInt($('#selecsize').find(":selected").val());
      //  console.log(size)
        //console.log(`http://localhost/Coffee/getdetailproduct.php?MaSP=${masp}`)
        $.ajax({
                        url: `getdetailproduct.php?MaSP=${masp}`,
                        method: 'GET',
                        contentType: "application/json; charset=utf-8",
                        success: function (response) {
                            response=JSON.parse(response)
                            console.log(response)
                            response.forEach((product) => {
                                    if(parseInt(product.size)==parseInt(size)){
                                        $("#tensp").val(product.TenSP);
                                        $("#tensp").attr("data-id",masp)
                                        $("#size").val(product.size);
                                        $("#size").attr("data-size",size)
                                        $("#soluong").val(product.soluong);
                                        $("#dongia").val(product.DonGia);
                                    }
                                });
                            
                        }
                    });
    })
    $("#saveupdate").click(function(){
        let object={
            masp:$("#tensp").attr("data-id"),
             size:parseInt($("#size").val()),
             oldsize:parseInt($("#size").attr("data-size")),
             soluong:parseInt($("#soluong").val()),
              dongia:parseInt($("#dongia").val())
        }
        console.log("gia tri object",object)
        $.post(`updatedetail.php`,object,function (data,status) {
                    console.log("sau kho update",data)
                  if(data==1){
                    $("#size").attr("data-size",$("#size").val())
                    $('#selecsize').find(":selected").val(parseInt($("#size").val()));
                    $('#selecsize').find(":selected").empty();
                    $('#selecsize').find(":selected").text("Túi "+parseInt($("#size").val())+"g")
                  }
                }
            );
})
var upload_img='';
$(".file-img").change(function(){
    let img=$(this).val()
    let e=$(this)
    console.log(img)
    const reader=new FileReader();
    reader.addEventListener("load",function(){
        upload_img= reader.result;
        console.log(upload_img)
        e.next().attr("src",upload_img)
    })
   reader.readAsDataURL(this.files[0])
   console.log($(this).val())
})
</script>
</html>