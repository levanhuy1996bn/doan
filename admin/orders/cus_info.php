<?php
include_once 'order_class.php';
$br=new orders();
$ds1=$br->getdata();
foreach ($ds1 as $key) {
        if($key->id==$idview) echo $key->id_cus;
    }
?><fieldset>
    <legend><u>THÔNG TIN KHÁCH HÀNG</u></legend>
  <table>
      <tr>
          <td><b>Khách hàng: </b></td>
          <td><?php
    foreach ($ds1 as $key) {
        if($key->id==$idview) echo $key->id_cus;
    }
    ?></td>
      </tr>
  </table>
  </fieldset>