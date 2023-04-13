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
<?php 
session_start();
?>
<body>
<?php
require './Menu.php';
?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                         if( isset($_SESSION['cart'])){
                         foreach($_SESSION['cart'] as $masp=>$itemcart):
                            foreach($itemcart['size'] as $size=>$itemsize):
                             ?>
                            
                            <tr>
                            <td class="align-middle"><img src="img/<?=$itemcart['AnhSanPham']?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?=$itemcart['TenSanPham'].'-Size:'.$size.'g'?></td>
                            <td class="align-middle" data-price="<?=$itemsize['DonGia']?>"><?=$itemsize['DonGia']?>đ</td>
                            <td class="align-middle changecount">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" data-id="<?=$masp?>" data-size="<?=$size?>">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" data-count="<?=$itemsize['soluongton']?>" value="<?=$itemsize['soluong']?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" data-id="<?=$masp?>" data-size="<?=$size?>">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php $dongia=$itemsize['DonGia'];
                            $soluong=$itemsize['soluong'];
                            $gia=$dongia*$soluong;
                            echo $gia;
                            ?>đ</td>
                            <td class="align-middle iconremove" data-id="<?=$masp?>" data-size="<?=$size?>"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>

                        <?php
                        endforeach;
                        endforeach;
                        }else{
                          echo  '<tr>Giỏ Hàng Trống</tr>';
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">

                <form class="card border-secondary mb-5"  action="/Coffee/checkout.php" method="POST">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-5" action="">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control p-4" placeholder="Coupon Code"> -->
                                <input type="text"class="form-control p-4"  name="km" id="inputkm" list="km" placeholder="Coupon Code"
                                value="<?php
                                    if(isset($_SESSION['km'])){
                                        echo $_SESSION['km'];
                                    }
                                    else{
                                        echo 0;
                                    }
                                ?>"
                                >
                                <datalist id="ckn">
                                    <!-- <option style="width: 100%;">Social</option>
                                    <option>Political</option>
                                    <option>Cultural</option>
                                    <option>Athletic</option>
                                    <option>Other</option> -->
                                </datalist>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="app_coupon">Mã Khuyến Mãi</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Giá trị đơn hàng</h6>
                            <input type="hidden" id="intput_gdh" name="intput_gdh" value="0">
                            <h6 class="font-weight-medium" id="price-total">0</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Khuyến Mãi</h6>
                            <input type="hidden" id="input_km" name="input_km" value="0">
                            <h6 class="font-weight-medium" id="khuyenmai">0đ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng giá trị</h5>
                            <input type="hidden" id="input_tongdh" name="input_tongdh" value="0">
                            <h5 class="font-weight-bold" id="total_final"></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3" id="button_checkout"<?php
                        if(empty($_SESSION['cart'])){
                            echo " disabled";
                        }
                        ?>
                        >Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cart End -->

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
    function checkCart(){
        if($("tbody tr").length==0){
            $("#button_checkout").attr("disabled",true);
        }
    }
    $("#app_coupon").click(function(){
          // console.log("/Coffee/khuyenmai.php?km="+$("#inputkm").val().trim())
          khuyenmai()
    
    })
    function khuyenmai(){
        $.ajax({
            url: "/Coffee/khuyenmai.php?km="+$("#inputkm").val().trim(),
            method: 'GET',
            success: function (response) {
                let total_price=parseInt($("#price-total").text().replace("đ",""));
                let giam=(parseInt(response)/100)*total_price
                $("#input_km").val(giam);
                $("#khuyenmai").text(giam+'đ')
                let total=total_price-parseInt(giam);
               $("#total_final").text(total+'đ')
                $("#input_tongdh").val(total)
            }})
    }
    function countTotal(){
        $.ajax({
            url: "/Coffee/Total-cart.php",
            method: 'GET',
            success: function (response) {
                $("#price-total").text(response+'đ')
                $("#intput_gdh").val(response)
                khuyenmai()
                let km=$("#khuyenmai").text().replace("đ","");
                let total=parseInt(response)-parseInt(km);
                $("#total_final").text(total+'đ')
                $("#input_tongdh").val(total)
                console.log("ll",$("#input_tongdh").val())
            }})
    }

    countTotal()
  //  khuyenmai()
    function updatecart(id,size,sl){
        console.log(`http://localhost/Coffee/change_cart.php?masp=${id}&soluong=${parseInt(sl)}&size=${parseInt(size)}`)
        $.ajax({
            url: `http://localhost/Coffee/change_cart.php?masp=${id}&soluong=${parseInt(sl)}&size=${parseInt(size)}`,
            method: 'GET',
            success: function (response) {
                response=JSON.parse(response)
                $("#item_cart").empty();
              $("#item_cart").text(response[1]);
                console.log('gia tri tra ve la: ',response)
                countTotal()
            }})
    }
$(".iconremove").click(function(e){
    let id=this.getAttribute("data-id");
    let size=this.getAttribute("data-size");
    updatecart(id,size,0)
    $(this).parent().remove();
    checkCart()
   // console.log();
   countTotal()

})
$('.btn-minus').click(function(e){
    let valuecount=this.parentElement.nextElementSibling.value;
    let id=this.getAttribute("data-id");
    
    let size=this.getAttribute("data-size");
    updatecart(id,size,valuecount)
   if(valuecount==0){
      $(this).parents('tr').remove();
      checkCart()
    }
    else{
        let dongia=parseInt(e.target.closest('.changecount').previousElementSibling.getAttribute("data-price"))
        let total=parseInt(valuecount)*dongia;
        e.target.closest('.changecount').nextElementSibling.innerHTML=total+'đ';
    }
})
$('.btn-plus').click(function(e){
    let valuecount=this.parentElement.previousElementSibling.value;
   if(valuecount>parseInt(this.parentElement.previousElementSibling.getAttribute("data-count"))){
    this.parentElement.previousElementSibling.value=parseInt(this.parentElement.previousElementSibling.getAttribute("data-count"));
   }
   let sl=this.parentElement.previousElementSibling.value;
    let id=this.getAttribute("data-id");
    let size=this.getAttribute("data-size");
    updatecart(id,size,sl)
    let dongia=parseInt(e.target.closest('.changecount').previousElementSibling.getAttribute("data-price"))
    let total=parseInt(sl)*dongia;
    e.target.closest('.changecount').nextElementSibling.innerHTML=total+'đ';
   
})
$("#count").change(function(){
   console.log("gaitri la: ",$(this).val())
})
$("#selectsize").change(function(){
    $('#count').val(1)
})

</script>
</html>