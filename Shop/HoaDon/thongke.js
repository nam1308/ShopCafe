console.log("chay 5555555555")
$(document).ready( function () {
    // $('.size_sanpham').find(":selected").dongia("data-count")
    // var listselect=document.getElementsByClassName("size_sanpham")
    // for(var i=0;i<listselect.length();i++){
    //     listselect[i].nextSibling.empty();
    //     listselect[i].nextSibling.innerHTML=listselect[i].find(":selected").dongia("data-count")
        
    // }

    $(".soluongmua").change(function(){
        if(parseInt($(this).val())<0){
            $(this).val(0)
        }
        console.log("gia tri phan tu tiep theo ",$(this).parent().next().find('.size_sanpham').find(":selected").attr("data-soluongton"))
        if(parseInt($(this).val()) > parseInt($(this).parent().next().find('.size_sanpham').find(":selected").attr("data-soluongton"))){
            $(this).val(parseInt($(this).parent().next().find('.size_sanpham').find(":selected").attr("data-soluongton")))
        }
        let dongia=parseInt($(this).parent().next().find('.size_sanpham').find(":selected").attr("data-dongia"))
        let soluong=parseInt($(this).val())
        let giatien=dongia*soluong
        console.log("next: ",$(this).parent().next().next())
        $(this).parent().next().next().empty();
        $(this).parent().next().next().text(giatien);
        console.log("gaitri la: ",$(this).val())

    })
    $(".addsanpham").click(function(){
        console.log($(this).parent().parent().find('.anh'))
        let sanpham= `<tr>
                        <td>
                        <img src="../../img/${$(this).parent().parent().find('.anh').attr("data-value")}" style="width:50px">
                        </td>
                        <td>
                        ${$(this).parent().parent().find('.ten').text()}
                        </td>
                        <td>
                            <input type="number" class="edit_soluong" value=${$(this).parent().parent().find('.soluongmua').val()}>
                        </td>
                        <td>
                            ${$(this).parent().parent().find('.size_sanpham').find(":selected").attr("data-dongia")}
                        </td>
                        <td>
                        ${$(this).parent().parent().find('.size_sanpham').find(":selected").val()}g
                        </td>
                        <td>
                        ${$(this).parent().parent().find('.dongia').text()}
                        </td>
                        <td>
                        <button type="button" style="color:black;" class="btn btn-success mt-1 delete" data-size="" data-id="">Cập Nhật</button>
                        </td>
                    </tr>`
                    console.log( $("#tbchitiet tbody"))
        $("#tbchitiet tbody").after(sanpham)
    })
    ///
    var i=0; 
    var database
        $.ajax({
                url: "getuser.php",
                method: 'GET',
                success: function (response) {
                    response=JSON.parse(response)
                    console.log(response)
                var table=$('#lstuser').DataTable({
                        "processing": true,
                        "info" : false,
                        "pageLength": 1,
                        data: response,
                        columns: [{
                            data: 'MaNguoiDung'
                        }, {
                            data: 'TenNguoiDung'
                        }, {
                            data: 'Email'
                        }, {
                            data: 'SoDienThoai'
                        }, {
                            data: 'DiaChi'
                        }, {
                            data: 'TaiKhoan'
                        }, {
                            data: 'TrangThai',
                            render:function(data,type,row){
                                console.log(row)
                                 return `
                                 <button type="button" style="font-size:10px; text-align: center;color:black;" class="btn btn-warning mt-1 showhd" data-id="${row.MaNguoiDung}">Hoa Don</button>
                                 <button type="button" style="font-size:10px; text-align: center;color:black;" class="btn btn-success mt-1 update" data-id="${row.MaNguoiDung}">Chỉnh Sửa</button>
                                 `
                            }
                        }]
                    });
                //show hd
                $("#lstuser tbody").on('click','.showhd',function(){
                    
                        let mand=$(this).attr("data-id")
                        let element=$(this)
                        console.log(mand)
                        console.log(`http://localhost/Coffee/danhsachhoadon.php?MaND=${mand}`)
                     $.ajax({
                        url: `danhsachhoadon.php?MaND=${mand}`,
                        method: 'GET',
                        success: function (response) {
                            response=JSON.parse(response)
                            database=response
                            console.log(response)
                       if(i==0){
                                i++;
                         var lhoadon=  $('#lsthoadon').DataTable({
                        "processing": true,
                        "info" : false,
                        "pageLength": 2,    
                         data:response,
                        columns: [{
                            data: 'TenNguoiNhan'
                        }, {
                            data: 'Email'
                        }, {
                            data: 'SDT'
                        },  {
                            data: 'DiaChiDatHang'
                        }, {
                            data: 'DonGia'
                        },{
                            data: 'GhiChu'
                        },{
                            data: 'PTThanhToan'
                        },{
                            data: 'phantramkhuyenmai'
                        },{
                            data: 'PhiVanChuyen'
                        },{
                            data: 'NgayDatHang'
                        },{
                            data: 'TinhTrang',
                            render:function(data,type,row){
                                //console.log(row)
                               return `<select name="trangthai" id="trangthai" data-id="${row.MaHDB}" class="trangthai">
                                        <option value="0" ${data==0?"selected=true":""}>Đang đóng gói</option>
                                        <option value="1" ${data==1?"selected=true":""}>Đang giao</option>
                                        <option value="2" ${data==2?"selected=true":""}>Đã giao xong</option>
                                        </select>`
                            }
                        },{
                            data: 'TinhTrang',
                            render:function(data,type,row){
                                //console.log(row)
                                 return `
                                 <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-warning mt-1 update" data-id="${row.MaHDB}" data-toggle="modal" data-target="#exampleModal">Cập Nhật</button>
                                 <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-success mt-1 delete" data-id="${row.MaHDB}">Hủy</button>
                                 <button type="button" style="width:98px; font-size:10px; text-align: center;color:black;" class="btn btn-success mt-1 detail" data-id="${row.MaHDB}" data-toggle="modal" data-target="#dialog-detail">Chi Tiết</button>
                                 `
                            }
                        }]
                    });
                    //chi tiet hoa don
                    $("#lsthoadon tbody").on('click','.detail',function(e){
                        let mahd = e.target.getAttribute("data-id");
                        $("#tbchitiet").remove();
                        var innerProductCategory = `<table class="table table-bordered"   id="tbchitiet" cellspacing="2" >
                                                        <tr id="tieudect">
                                                            <th>
                                                            Anh San Pham
                                                            </th>
                                                            <th>
                                                                Tên Sản Phẩm
                                                            </th>
                                                            <th>
                                                                    Số Lượng
                                                            </th>
                                                            <th>
                                                                    Giá Bán
                                                            </th>
                                                            <th>
                                                                    Size
                                                            </th>
                                                            <th>
                                                                    Tong Gia
                                                            </th>
                                                            <th>
                                                                   Update
                                                            </th>
                                                        </tr>`
                        let urlGetPhanloai = "ChiTietHoaDonBan.php?MaHDB=" + mahd
                        console.log(urlGetPhanloai)
                        $.ajax({
                            url: urlGetPhanloai,
                            method: 'GET',
                            success: function (response) {
                                response=JSON.parse(response)
                                console.log(response[1])
                                response[0].forEach((product) => {
                                    let selectag='<select class="inputtk Size select-size">'
                                    let msp=product.MaSP
                                    let selected=''
                                    for (const property in response[1][product.MaSP]) {
                                        let check=true;
                                        if(parseInt(property)==parseInt(product.Size)){
                                            selected="selected"
                                        }
                                        else{
                                            selected=''
                                        }
                                        //
                                        response[0].forEach((pro) => {
                                            if(parseInt(property)==parseInt(pro.Size) 
                                            && parseInt(property)!=parseInt(product.Size) && product.MaSP==pro.MaSP){
                                                        check=false
                                            }
                                        })
                                        //  
                                    console.log(`${property}: ${response[1][product.MaSP][property]['DonGia']}`);
                                    if(check)
                                    selectag+=`<option value="${property}" data-id=${product.MaSP} ${selected} data-Gia=${response[1][product.MaSP][property]['DonGia']} data-count=${response[1][product.MaSP][property]['SoLuongTon']}>${property}</option>`
                                    }
                                    selectag+=`</select>`
                                    console.log("chay")
                                    innerProductCategory += `<tr>
                                                                <td>
                                                                <img src="../../img/${product.AnhSanPham}" style="width:50px">
                                                                </td>
                                                                <td>
                                                                ${product.TenSP}
                                                                </td>
                                                                <td>
                                                                 <input type="number" data-count-old=${product.SoLuong} class="edit_soluong" value=${product.SoLuong}>
                                                                </td>
                                                                <td>
                                                                    ${product.DonGia}
                                                                </td>
                                                                <td>
                                                                ${product.Size}g
                                                                </td>
                                                                <td>
                                                                ${parseInt(product.DonGia)*parseInt(product.SoLuong)}
                                                                </td>
                                                                <td>
                                                                <button type="button" style="color:black;" class="btn btn-success mt-1 update_hoadon_detail" data-sp="${product.MaSP}" data-size="${product.Size}" data-id="${product.MaHDB}">Cập Nhật</button>
                                                                </td>
                                                            </tr>`
                                });
                                innerProductCategory+='</table>'
                                document.getElementById("body_detail").innerHTML = innerProductCategory;
                                $(".select-size").change(function(){
                                    let masp=$(this).attr("data-id")
                                    console.log("chay")
                                    let size=$(this).val()
                                    let id=`option[data-id="${masp}"][value="${size}"]`
                                    console.log($(this).filter(id).val())
                                })
                                $("#tbchitiet tbody").on('click','.update_hoadon_detail',function(e){
                                    let size=$(this).attr("data-size")
                                    let mahdb=$(this).attr("data-id")
                                    let masp=$(this).attr("data-sp")
                                    let my=$(this)
                                    let object1={
                                        masp:$(this).attr("data-sp"),
                                        size:$(this).attr("data-size"),
                                        mahdb:$(this).attr("data-id"),
                                        soluong:$(this).parent().parent().find('.edit_soluong').val(),
                                        soluongcu:$(this).parent().parent().find('.edit_soluong').attr("data-count-old")
                                    }
                                    $.ajax({
                                        url: "capnhat_chitiethoadon.php",
                                        type: 'PUT',
                                        data: JSON.stringify(object1),
                                        success: function (response) {
                                              console.log(JSON.parse(response))
                                              response=JSON.parse(response)
                                              my.parent().parent().find('.edit_soluong').attr("data-count-old",parseInt(response.soluong))
                                              my.parent().parent().find('.edit_soluong').val(parseInt(response.soluong))
                                        },
                                        error:function(error){
                                            console.log("error: ",error)
                                        }
                                   })
                                })
                            }
                   
                        })
                    })
                    //chi tiet hoa don
                    // huy hoa don 
                        $("#lsthoadon tbody").on('click','.delete',function(e){
                            let mahdb=$(this).attr("data-id")
                            console.log(`http://localhost/Coffee/update_status_hoadon.php?MaHDB=${mahdb}`)
                            $.ajax({
                            url: `huy_hoadon.php?MaHDB=${mahdb}`,
                            method: 'GET',
                            success: function (response) {
                                    database = database.filter(function( obj ) {
                                            return obj.MaHDB !== response;
                                        });
                                var row=e.target.closest('tr')
                                  $("#lsthoadon").dataTable().fnDeleteRow(row)
                            }
                       })
                    })

                    //huy hoa don
                    //cap nhat trang thai
                    $("#lsthoadon tbody").on('change','.trangthai',function(){
                      ///  console.log($(this).attr("data-id"))
                        let mahdb=$(this).attr("data-id")
                        let e=$(this)
                        let trangthai=$(this).val()
                        console.log(`http://localhost/Coffee/update_status_hoadon.php?MaHDB=${mahdb}&trangthai=${trangthai}`)
                        $.ajax({
                        url: `update_status_hoadon.php?MaHDB=${mahdb}&trangthai=${trangthai}`,
                        method: 'GET',
                        success: function (response) {
                            database.forEach(function(hoadon){
                            if(mahdb==hoadon.MaHDB){
                                hoadon.TinhTrang=response;
                            }
                        })
                        }
                    })
                    })
                    //cap nhat hoa don
                    $("#lsthoadon tbody").on('click','.update',function(){
                      let mahd=$(this).attr("data-id")
                        database.forEach(function(hoadon){
                            if(mahd==hoadon.MaHDB){
                                console.log(hoadon)
                                
                                $("#mahdb").val(hoadon.MaHDB)
                                $("#tenNN").val(hoadon.TenNguoiNhan)
                                $("#email").val(hoadon.Email)
                                $("#sdt").val(hoadon.SDT)
                                $("#dongia").val(hoadon.DonGia)
                                $("#ghichu").val(hoadon.GhiChu)
                                $("#pttt").val(hoadon.PTThanhToan)
                                $("#diachi").val(hoadon.DiaChiDatHang)
                                
                                $('#trangthaiupdate').find(":selected").attr("selected",false)
                                let id=`#trangthaiupdate option[value="${parseInt(hoadon.TinhTrang)}"]`
                                $(id).attr('selected',true);
                                console.log($('#trangthaiupdate').find(":selected").val())
                                $('#khuyenmai').find(":selected").attr("selected",false)
                                id=`#khuyenmai option[value="${hoadon.MaKM}"]`
                                console.log(id)
                                $(id).attr('selected',true);
                                console.log($('#khuyenmai').find(":selected").val())
                                $("#phivanchuyen").val(hoadon.PhiVanChuyen)
                                $("#ngaydathang").val(hoadon.NgayDatHang)
                            }
                        })
                    })
                    //cap nhat hoa don
                            }
                            else{
                                $('#lsthoadon').dataTable().fnClearTable();
                                $('#lsthoadon').dataTable().fnAddData(response);
                            }
                     
                        }
                    })
                    })
                //show hd
                }
    })
    $("#saveupdate").click(function(){
        $("#mahdb").val()
        $("#tenNN").val()
        $("#email").val()
        $("#sdt").val()
        $("#dongia").val()
        $("#ghichu").val()
        $("#pttt").val()
        $("#diachi").val()
        $('#khuyenmai').val()
        $('#trangthaiupdate').val()
        console.log($('#khuyenmai').val())
      let data={
        mahdb:$("#mahdb").val(),
        tennn:$("#tenNN").val(),
        email:$("#email").val(),
        sdt:$("#sdt").val(),
        dongia:$("#dongia").val(),
        ghichu:$("#ghichu").val(),
        pttt:$("#pttt").val(),
        diachi:$("#diachi").val(),
        phivanchuyen:$("#phivanchuyen").val(),
        ngaydathang:$("#ngaydathang").val(),
        khuyenmai:$('#khuyenmai').val(),
        trangthai:$('#trangthaiupdate').val(),
        phantramkhuyenmai:parseInt($('#khuyenmai').find(":selected").attr('data-value'))
      };
      console.log(data)
      $.post(`CapNhatHoaDon.php`,data,function (dataupdate,status) {
                   
                    dataupdate=JSON.parse(dataupdate)
                    console.log("sau kho update",dataupdate)
                    console.log("database",database)
                    database.forEach(function(hoadon){
                            if(dataupdate.mahdb==hoadon.MaHDB){
                                hoadon.TenNguoiNhan=dataupdate.tennn;
                                hoadon.PTThanhToan=dataupdate.pttt;
                                hoadon.Email=dataupdate.email;
                                hoadon.SDT=dataupdate.sdt;
                                hoadon.GhiChu=dataupdate.ghichu;
                                hoadon.DonGia=dataupdate.dongia;
                                hoadon.DiaChiDatHang=dataupdate.diachi;
                                hoadon.PhiVanChuyen=dataupdate.phivanchuyen;
                                hoadon.NgayDatHang=dataupdate.ngaydathang;
                                hoadon.MaKM=dataupdate.khuyenmai;
                                hoadon.TinhTrang=dataupdate.trangthai;
                                hoadon.phantramkhuyenmai=dataupdate.phantramkhuyenmai;
                        }
                    })
                    $('#lsthoadon').dataTable().fnClearTable();
                                $('#lsthoadon').dataTable().fnAddData(database);
                })
    })
})