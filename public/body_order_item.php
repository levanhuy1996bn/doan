<?php
include_once '../admin/product_group/product_group_class.php';
$type=new product_group();
$ds3=$type->getdata();
include_once '../admin/orders/order_class.php';
$od=new orders();
$ds2=$od->get($idview);
include_once '../admin/orders/order_item_class.php';
$show=new order_item();
$ds=$show->getidorders($idview);
?>

<div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-dark table-striped"  >
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting col-md-1">STT</th>
                                            <th class="sorting_asc col-md-5">Tên sản phẩm nhóm</th>
                                            <th class="sorting col-md-2">Số lượng</th>
                                            <th class="sorting col-md-1">Giá</th>
                                            <th class="sorting col-md-2">Thành tiền: (VNĐ)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $poss=0;
                                         foreach ($ds as $keys){
                                            $poss++;
                                         ?>
                                            <tr align="left">
                                                <td align="center"><?=$poss?></td>
                                                <td><a href="#"><?php 
                                                    foreach ($ds3 as $ct1) {
                                                        if($keys->id_progroup==$ct1->id) echo $ct1->id_pro;}
                                                 ?></a></td>
                                                 <td align="center"><?=$keys->qty?></td>
                                                <td>
                                                    <?=number_format($keys->price)?>

                                                </td>
                                                <td><?=number_format($keys->total)?>
                                                </td>
                                            </tr><?php } ?>
                                        <tr>
                                            <td colspan="3"  align="center"><b>Tổng</b></td>
                                            <td colspan="2"><b class="text-red"><?php
                                            foreach ($ds2 as  $hd2) {
                                                echo number_format($hd2->total)." VNĐ";
                                            }
                                            ?></b></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>