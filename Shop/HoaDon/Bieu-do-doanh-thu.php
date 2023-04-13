<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/bieudo.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="./thongke.js"></script>
  <style>
#begin,#end{
    margin-left: 10px;
    height: 30px;
    margin-right: 10px;
    margin-top: 15px;
}
#but-show-chart{
  margin-top: 10px;
}
  </style>
</head>
<body>
<div class="wrapper ">
<?php
require '../Menu.php';
?>
<div class="main-panel">
    <div class="d-flex">
        <input id="begin" type="date">
        <input id="end" type="date">
        <button id="but-show-chart" class="btn btn-info" type="button">Show Chart</button>
    </div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="../../js/bieudo.js"></script>
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    Biêu đồ biểu thị doanh số bán sản phẩm của cửa hàng
  </p>
</figure>
</div>
</body>


<script>
var begin='2022-01-29';
var end='2022-05-30';
$("#begin").change(function(e){
begin=$(this).val()
})
$("#end").change(function(e){
end=$(this).val()
})
$('button').click(function(){
  chartt()
})
function chartt(){
  $.ajax({
            url: `thongsobieudo.php?begin=${begin}&end=${end}`,
            method: 'GET',
            success: function (response) {
                response=JSON.parse(response)
                console.log("du lieu thong ke la: ", response)
                const arrX=Object.values(response[0]) 
                //console.log(arrX)
               const arrDetail=[]
              Object.values(response[1]).forEach(e => {
                  //console.log(e['data'])
                  e['data']=Object.values(e.data)
                  arrDetail.push(e)
              });
              console.log("detail",arrDetail)
                Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      align: 'left',
      text: 'Thông kê mức tiêu thụ theo sản phẩm'
    },
    subtitle: {
      align: 'left',
      text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">eCoffee.com</a>'
    },
    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Thống kê'
      }
  
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: '{point.y:.1f}'
        }
      }
    },
  
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },
  
    series: [
      {
        name: "Tổng Quan",
        colorByPoint: true,
        data: 
        arrX
        
      }
    ],
    drilldown: {
      breadcrumbs: {
        position: {
          align: 'right'
        }
      },
      series: arrDetail
    }
  });
            }})


}
$("#thongke").attr("class","active");

</script>
</html>