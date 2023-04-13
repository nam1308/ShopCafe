<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
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
        .main-panel{
      padding-left: 20px;
      padding: 20px;
    }
    .btn{
      padding:12px 0px;
    }
    </style>
</head>


<body>
<div class="wrapper ">
    <?php
    require_once '../Menu.php';
    ?>
    <div class="main-panel">
    <button  class="btn btn-info mt-1 mb-2 ml-2" ><a style="color:white; text-decoration: none;"  href="/Coffee/Shop/Product/addproduct.php">Thêm Sản Phẩm</a></button>
    <table id="mytable" class="display" style="width:100%">
        <thead class="bg-success">
            <tr>
                <th scope="col">Ảnh Sản Phẩm</th>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Tên Phân Loại</th>
                <th scope="col">Tên Hãng Sản Xuất</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
     
    </table>
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 bg-dark navbarh">
                <h3 class="text-center p-2 text-white border-bootom"> Boostrap 4</h3>
                <div class="user-account p-2 border-bottom">
                    <img src="./img/venom.jpg" alt="" class="anh">
                    <span class="ml-2 text-white name-user">ManchesterUniter</span>
                </div>
                <div class="menu">
                    <p class="showlist">
                        <a class="select collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                  Quan ly sinh vien
                </a>
                    </p>
                    <div class="collapse list_select" id="collapseExample">
                        <ul>
                            <li class="item_qlsv" data-toggle="collapse" data-target="#liststudent" aria-expanded="false" aria-controls="liststudent">Danh sach sinh vien</li>
                            <li class="item_qlsv">Them moi sinh vien</li>
                        </ul>
                    </div>
                </div>
                <div class="menu">
                    <p class="showlist">
                        <a class="select collapsed" data-toggle="collapse" href="#quanlylophoc" role="button" aria-expanded="false" aria-controls="quanlylophoc">
                  Quan ly lop hoc
                </a>
                    </p>
                    <div class="collapse list_select" id="quanlylophoc">
                        <ul>
                            <li class="item_qlsv">Danh sach lop hoc</li>
                            <li class="item_qlsv">Them moi lop hoc</li>
                        </ul>
                    </div>
                </div>
                <div class="menu">
                    <p class="showlist">
                        <a class="select collapsed" data-toggle="collapse" href="#Sigin" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Đăng Nhập
                        </a>
                    </p>
                </div>
                <div class="dangxuat">
                    <a href="#">
                        <h3>Dang xuat</h3>
                    </a>

                </div>
            </div>
            <div class="col-sm-10" id="accordion">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select
                      </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Setting</a>
                                    <a class="dropdown-item" href="#">Document</a>
                                    <a class="dropdown-item" href="#">Other</a>
                                </div>
                            </li>

                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

                <form id="Sigin" class="collapse" action="b.html" method="post" data-parent="#accordion">
                    <div class="label">
                        <h1>Đăng Kí</h1>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Đia chỉ">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Phone</label>
                        <input type="number" class="form-control" id="inputAddress2" placeholder="Phone Number">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                          <option selected>Ngành</option>
                          <option>CNTT</option>
                          <option>Cầu Đường</option>
                          <option>Vận Tải</option>
                          <option>Kinh Tế</option>
                        </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
                <div id="liststudent" class=" collapse" data-parent="#accordion">
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th scope="col" style="width:10%">#</th>
                                <th scope="col" style="width:20%">First</th>
                                <th scope="col" style="width:20%">Last</th>
                                <th scope="col" style="width:20%">Handle</th>
                                <th scope="col" class="text-center" style="width:30%">
                                    Select
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="w-100">
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <th scope="col" class="text-center">
                                    <button type="button" class="btn btn-success">Success</button>
                                    <button type="button" class="btn btn-danger">Danger</button>
                                </th>
                            </tr>
                            <tr class="w-100">
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <th scope="col" class="text-center">
                                    <button type="button" class="btn btn-success">Success</button>
                                    <button type="button" class="btn btn-danger">Danger</button>
                                </th>
                            </tr>
                            <tr class="w-100">
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <th scope="col" class="text-center">
                                    <button type="button" class="btn btn-success">Success</button>
                                    <button type="button" class="btn btn-danger">Danger</button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered"   id="tbchitiet" cellspacing="2" >
                   
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
  </div>
</body>

<script>
  
      
   

     $(document).ready( function () {
         //begin ready
         //begin ajax
      console.log("chaydddddddddddddddd")  
  function chitiet(){
          console.log($(this).attr("data-id"))
                }
        $.ajax({
                url: "http://localhost/Coffee/Shop/Product/getlistproductadmin.php",
                method: 'GET',
                success: function (response) {
                    response=JSON.parse(response)
                    console.log(response)
                    function deleterow(data){
                        console.log(data)
                        var row=$(data).closest('tr')
                        var nrow=row[0]
                        $("#mytable").dataTable().fnDeleteRow(nrow)
                    }
                var oTable=$('#mytable').DataTable({
                        "processing": true,
                        "info" : false,
                        "pageLength": 2,
                        data: response,
                        columns: [{
                            data: 'AnhSanPham',
                            render:function(data,type,row){
                                var btn;
                               
                                    return `<img class="img-fluid w-100" style="width:60px" src="../../img/${data}" alt="">`
                                
                            }
                        }, {
                            data: 'MaSP'
                        }, {
                            data: 'TenSP'
                        }, {
                            data: 'MoTaSanPham'
                        }, {
                            data: 'TenPhanLoai'
                        }, {
                            data: 'TenHSX'
                        }, {
                            data: 'TrangThai',
                            render:function(data,type,row){
                                console.log("chay update")
                                console.log(row.MaSP)
                               let but;
                                if(data==1){
                                    but=`<button type="button" id="status" style="width:98px" data-id=${row.MaSP} data-status="0" class="btn btn-primary">Ẩn</button>`
                                }else{
                                    but=`<button type="button" id="status" style="width:98px" data-id=${row.MaSP} data-status="1" class="btn btn-secondary">Hiện</button>`
                                }
                                 return `<div class="but">
                                 ${but}
                                 <button type="button" style="width:98px" class="btn btn-warning mt-1 detail" data-id=${row.MaSP} data-toggle="modal" data-target="#exampleModal">Chi Tiết</button>
                                 <button type="button" style="width:98px" class="btn btn-success mt-1 update" data-id=${row.MaSP}><a style="color:white; text-decoration: none;"  href="/Coffee/Shop/Product/updateproduct.php?MaSP=${row.MaSP}">Chỉnh Sửa</a></button>
                                 <button type="button" style="width:98px" class="btn btn-danger mt-1 delete"  data-id=${row.MaSP}>Xóa</button>
                                 </div>`
                            }
                        }]
                    });
                    //delete san pham
                 
                     $("#mytable tbody").on('click','.delete',function(e){
                        
                        let masp=$(this).attr("data-id")
                        console.log(`http://localhost/Coffee/updatestatus.php?MaSP=${masp}`)
                        $.ajax({
                            url: `http://localhost/Coffee/Shop/Product/deleteproduct.php?MaSP=${masp}`,
                            method: 'GET',
                            success: function (response) {
                               if(response==1){
                                   alert("Xoa thanh cong")
                                   var row=e.target.closest('tr')
                                  $("#mytable").dataTable().fnDeleteRow(row)
                               }else{
                                   alert("Xoa that bai")
                               }
                            }
                    })
                   })
                    //update hien thi
                    $("#mytable tbody").on('click','#status',function(){
                        let masp=$(this).attr("data-id")
                        let element=$(this)
                        let sta=parseInt($(this).attr("data-status"))
                        console.log("chay")
                        console.log(masp)
                        console.log(`http://localhost/Coffee/updatestatus.php?MaSP=${masp}&status=${sta}`)
                     $.ajax({
                        url: `http://localhost/Coffee/Shop/Product/updatestatus.php?MaSP=${masp}&status=${sta}`,
                        method: 'GET',
                        success: function (response) {
                            if(parseInt(response)==1){
                                element.attr("data-status",0)
                                element.attr("class","btn btn-primary")
                                element.empty()
                                element.text("Ẩn")
                            }else{
                                element.attr("data-status",1)
                                element.attr("class","btn btn-secondary")
                                element.empty()
                                element.text("Hiện")
                            }
                        }
                    })
                    })
                    //sua
                    console.log("end")
                   $("#mytable tbody").on('click','.detail',function(){
                       console.log('gia tri dang nhan la',$(this).attr("data-id"))
                       let masp=$(this).attr("data-id")
                       $.ajax({
                        url: `http://localhost/Coffee/Shop/Product/getdetailproduct.php?MaSP=${masp}`,
                        method: 'GET',
                        contentType: "application/json; charset=utf-8",
                        success: function (response) {
                            response=JSON.parse(response)
                           let contentdetail=`<tr id="tieudect">
                                         <th>
                                            Tên Sản Phẩm
                                        </th>
                                        <th>
                                              Khối lượng
                                        </th>
                                        <th>
                                                Giá Bán
                                        </th>
                                        <th>
                                               Số Lượng
                                        </th>
                                        <th>
                                               
                                        </th>
                                        </tr>`
                           response.forEach((product) => {
                            contentdetail += ` <tr>
                                        <td>
                                        ${product.TenSP}
                                        </td>
                                        <td>
                                        ${product.size}
                                        </td>
                                        <td>
                                            ${product.DonGia}
                                        </td>
                                        <td>
                                            ${product.soluong}
                                        </td>
                                        <td>
                                        <button type="button" style="width:98px" class="btn btn-danger mt-1 delete-detail" data-size="${product.size}"  data-id="${product.MaSP}">Xóa</button>
                                        </td>
                                    </tr>`

                                });
                                $('.delete-detail').unbind('click')
                                document.getElementById("tbchitiet").innerHTML = contentdetail;
                                $('.delete-detail').click(function(e){
                                    let masp=$(this).attr("data-id")
                                    let size=$(this).attr("data-size")
                                    console.log(e.target.closest('tr'))
                                    console.log(`http://localhost/Coffee/delete-product-detail.php?MaSP=${masp}&Size=${size}`)
                                    $.ajax({
                                      url: `http://localhost/Coffee/Shop/Product/delete-product-detail.php?MaSP=${masp}&Size=${size}`,
                                        method: 'GET',
                                        success: function (response) {
                                            if(response==1){
                                                alert("Xoa Thanh Cong");
                                                e.target.closest('tr').remove()
                                            }
                                            else{
                                                alert("Xoa That Bai")
                                            }
                                        }
                                    })
                                })
                        }
                    });
                   })
                }
               
            })
//end ajax



                //end ready
    })
    $("#quanly").attr("class","active");
</script>

</html>