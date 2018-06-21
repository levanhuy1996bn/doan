<!DOCTYPE html>
<html>
<head>
    <title>In hóa đơn</title>
    <style type="text/css">
        body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:red;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:40%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 16px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
    </style>
</head>
<body>
    <?php 
    $idview=$_GET['id'];
    $namecus=$_GET["namcus"];
    include_once './product_group/product_group_class.php';
    include_once 'order_item_class.php';
    include_once './customer/customer_class.php';
    $br=new customer();
    $ds1=$br->getname($namecus);
    $show=new order_item();
    $ds=$show->getidorders($idview);
    $type=new product_group();
    $ds2=$type->getdata();
     ?>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="../public/area/assets/images/brands/brand2.png"/></div>
        <div style="margin-right: 50px;" class="company">Shop thời trang Trẻ</div>
        <div style="float: right;"><i>Địa chỉ: Số 14 Cầu Giấy, Đống Đa, Hà Nội</i></div><br>
    </div>
  <fieldset>
  <table>
    <?php
    foreach ($ds1 as $key) {
    ?>
      <tr>
          <td><b>Khách hàng: </b></td>
          <td><?=$key->name?></td>
      </tr>
      <tr>
          <td><b>Email: </b></td>
          <td><?=$key->email?></td>
      </tr>
      <tr>
          <td><b>Điện thoại: </b></td>
          <td><?=$key->phone?></td>
      </tr>
      <tr>
          <td><b>Địa chỉ: </b></td>
          <td><?=$key->address?></td>
      </tr>
      <?php } ?>
  </table>
  </fieldset>
  <br>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br>
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>Thành tiền</th>
    </tr>
    <?php
        $tongsotien = 0;
        $pos = 1;
        $tongsotien = 0;
        foreach($ds as $ct1)
        {
            $tongsotien += $ct1->qty*$ct1->price;
            echo "<tr>";
            echo "<td class=\"cotSTT\">".$pos++."</td>";
            foreach ($ds2 as $key){
                if($key->id==$ct1->id_progroup)
            echo "<td class=\"cotTenSanPham\">".$key->id_pro."(".$key->id_color." - ".$key->id_size.")</td>";
            }
            echo "<td class=\"cotSoLuong\" align='center'>".$ct1->qty."</td>";
            echo "<td class=\"cotGia\">".number_format($ct1->price)."</td>";
            echo "<td class=\"cotSo\">".number_format($ct1->total)."</td>";
            echo "</tr>";
    }       
?>
    <tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo"><?php echo number_format(($tongsotien),0,",",".")?></td>
    </tr>
  </table>
  <div class="footer-right"> Hà Nội, ngày <?=date("d")?> tháng <?=date("m")?> năm <?=date("Y")?><br/>
    <i>(khách hàng ký tên)</i>
    </div>
</div>
</body>
</body>
</html>
