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
    </style>
</head>
<?php
session_start();
require './connect.php';
$sql='select * from sanpham';
$result=mysqli_query($connect,$sql);
?>
<body>
  <?php
  require './Menu.php';
  ?>
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Sản Phẩm</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1" id="sort">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search" id="icon_search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-12 pb-1 d-flex flex-wrap listproduct" id="list-product">
                   
                    <?php 
                    $sql='select * from PhanLoai';
                    $category=mysqli_query($connect,$sql);
                    ?>
                    </div>
                    <div class="col-12 pb-1" id="pagnation">
                      
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
            <div class="col-lg-3 col-md-12">
                <!---category-->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Category</h5>
                    <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input category allcategory" checked id="category-all" value="PL">
                            <label class="custom-control-label" for="category-all">All</label>
                        </div>
                    <?php
                    $i=0;
                    foreach($category as $each):?>  
                      
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input category categoryitem" id="category_<?php echo ++$i;?>" value="<?=$each['MaPhanLoai']?>">
                            <label class="custom-control-label" for="category_<?php echo $i;?>"><?=$each['TenPhanLoai']?></label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>

                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input price_input" name="price" value="" checked id="price-all">
                            <label class="custom-control-label price_cate" for="price-all">All Price</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input price_input" name="price" value="" id="price-0">
                            <label class="custom-control-label price_cate" for="price-0">< 1500.000đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input price_input" name="price" id="price-1">
                            <label class="custom-control-label price_cate" for="price-1">1600.000đ - 3000.000đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input price_input" name="price" id="price-2">
                            <label class="custom-control-label price_cate" for="price-2">3000.000đ - 5000.000đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input price_input" name="price" id="price-3">
                            <label class="custom-control-label price_cate" for="price-3">5000.000đ - 6000.000đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input price_input" name="price" id="price-4">
                            <label class="custom-control-label price_cate" for="price-4">> 6000.000đ</label>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Shop Sidebar End -->

        </div>
    </div>
    <!-- Shop End -->

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
        const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});
var phanloai=params.MaPhanLoai
console.log(phanloai)
//pagination
  function showproduct(response){
    $('#pagnation').pagination({
    dataSource: response,
    pageSize: 3,
    formatResult: function(data) {
       
    },
    callback: function(response, pagination) {
        console.log("respon",response)
        var html = '';
        response.forEach((product) =>{
            let checksoluong=''
            if(product['SoLuong']<=0)checksoluong='<span style="color:gray" class="label_hethang">Đã Hết Hàng</span>'
                html += `  <div class="col-lg-4 col-md-6 col-sm-12 pb-1 product_show_pagination">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                ${checksoluong}
                                <img class="img-fluid w-100" src="img/${product['AnhSanPham']}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">${product['TenSP']}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${Intl.NumberFormat('en-VE', { maximumSignificantDigits: 3 }).format(product['DonGia'])}đ</h6><h6 class="text-muted ml-2">${product['Size']}g</h6> 
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="./detail.php?MaSanPham=${product['MaSP']}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" ${product['SoLuong']<=0?'disabled="disabled"':''} class="btn btn-sm text-dark p-0 add_to_cart" data-id="${product['MaSP']}" data-size="${product['Size']}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>`;
            });
            $('.add_to_cart').unbind('click')
            document.getElementById('list-product').innerHTML = html;
   //event add to cart 

   $(".add_to_cart").click(function(e){
    e.preventDefault();
    let masp=$(this).attr("data-id");
    let size=$(this).attr("data-size");

  //  console.log(`http://localhost/Coffee/addtocart.php?masp=${masp}&soluong=1&size=${size}`)
    $.ajax({
            url: `http://localhost/Coffee/addtocart.php?masp=${masp}&soluong=1&size=${size}`,
            method: 'GET',
            success: function (response) {
                response=JSON.parse(response)
               if(parseInt(response[0])==1){
                   console.log("so san pham trong gio la: ",parseInt($(".badge").text())+1)
                let sl=parseInt($(".badge").text())+1;
                $(".number_cart").empty()
                $(".number_cart").text(sl)
               }
            }})
})

   //event add to cart
    }
})
     
  }
  var urllistproduct="/Coffee/getlistproduct.php"
 // console.log(document.querySelector(`.categoryitem[value="${phanloai}"]`)!=null);
if(phanloai && document.querySelector(`.categoryitem[value="${phanloai}"]`)!=null){
    console.log("co chay")
    urllistproduct=urllistproduct+"?MaPhanLoai="+phanloai
        document.getElementById("category-all").checked = false;
        document.querySelector(`.categoryitem[value="${phanloai}"]`).checked=true;  
        console.log(urllistproduct)
} 


    
    $.ajax({
        url: urllistproduct,
        method: 'GET',
        contentType: "application/json; charset=utf-8",
        success: function (response) {
            response=JSON.parse(response)
            showproduct(response)
        
        }
    });
//pagination
        var Maphanloai=""
        var gia=''
        let search=""
        function searchCategory(Maphanloai,gia,search){
            $.ajax({
            url: "http://localhost/Coffee/getlistproductbycategory.php?maphanloai="+Maphanloai+"&gia="+gia+"&search="+search,
            method: 'GET',
            success: function (response) {
                response=JSON.parse(response)
                console.log("ket qua khi change", response)
                showproduct(response)
            
            }})
        }
        $(".allcategory").change(function(){
            Maphanloai=""
            search=$("#search").val();
            if($('.allcategory').is(':checked')){
                $(".categoryitem").prop( "checked", false );
                console.log("co chay vao day nha")
            }
           console.log( "http://localhost/Coffee/getlistproductbycategory.php?maphanloai="+Maphanloai+"&gia="+gia+"&search="+search)
           searchCategory(Maphanloai,gia,search)
        })
        $(".categoryitem").change(function(){
            Maphanloai=""
            search=$("#search").val();
         //   console.log("gia tri la",$(".categoryitem:checked").length)
            if($(".categoryitem:checked").length>0){
             document.getElementById("category-all").checked = false;
            }else{
                document.getElementById("category-all").checked = true;
            }
            let i=0
            $(".category:checked").each(function(){
                if(i==0)
                Maphanloai+=$(this).val()
                else
                Maphanloai+="-"+$(this).val()
                i++;
        });
        console.log( "http://localhost/Coffee/getlistproductbycategory.php?maphanloai="+Maphanloai+"&gia="+gia+"&search="+search)
       searchCategory(Maphanloai,gia,search)
      //  console.log("gia tri category",Maphanloai)
        })
       
        $(".price_cate").click(function(){
                if($(this).text() =='All Price'){
                    gia=''
                }else{
                    gia=$(this).text()
                }
                console.log( "http://localhost/Coffee/getlistproductbycategory.php?maphanloai="+Maphanloai+"&gia="+gia)
                searchCategory(Maphanloai,gia,search)
                console.log("gia la",gia)
        })
        
        $("#icon_search").click(function(){
            search=$("#search").val();
            searchCategory(Maphanloai,gia,search)
        })
 
    </script>
</body>

</html>