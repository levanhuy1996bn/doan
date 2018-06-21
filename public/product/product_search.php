<?php 
	$key=(string)$_GET['key'];
    if (isset($_GET['page'])) {
    $trang = $_GET['page'];
    }
    else $trang =1;
    $number = 6;
    $from=($trang -1)*$number;
    include_once '../admin/product_group/product_group_class.php';
    $a=new product_group();
    $show=$a->search($key,$from,$number);
    if(count($show)>0){
         echo "<div style='text-align: center; font-size: 20px; color: blue; font-weight: bold;''>Sản phẩm có từ khóa ".'"'.$key.'"'."</div>";
    }
?>
<div class="search-result-container ">
    <div id="myTabContent" class="tab-content category-list">
        <div class="tab-pane active " id="grid-container">
            <div class="category-product">
                <div class="row">
                                            <?php
                                                foreach ($show as $value){
                                                ?>
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="detail.php?id=<?=$value->id?>"><img  src="./Upload/<?=$value->image?>" alt=""></a> </div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="detail.php?id=<?=$value->id?>"><?=$value->id_pro?></a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"> <?=number_format(($value->price-($value->price*$value->discount/100)))?>  </span> <span class="price-before-discount"><?=number_format($value->price)?></span> </div>
                                                        </div>
                                                        <!-- /.cart --> 
                                                    </div>
                                                    <!-- /.product --> 

                                                </div>
                                                <!-- /.products --> 
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        if(count($show)>0){
                                        ?>
                        <div style="text-align: center;">
                            <ul class="pagination">
                                <li><?php
                                    if($trang>1 && count($show)>1){
                                        echo '<a href="index.php?p=product/product_search.php&key='.$key.'&page='.($trang-1).'">Previous</a>';
                                    }
                                ?></li>
                            <?php for($i=1;$i<=$show[0]->sotrang;$i++) {?>
                            <li class="page-item <?= $i==$trang ? "active" :"" ?> "><a href="index.php?p=product/product_search.php&key=<?=$key?>&page=<?=$i?>" ><?=$i?></a></li>
                            <?php } ?>
                            <li>
                                <?php
                                    if($trang<$show[0]->sotrang && count($show)>1){
                                        echo '<a href="index.php?p=product/product_search.php&key='.$key.'&page='.($trang+1).'">Next</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div><?php }else{
                        echo "<div style='text-align: center; font-size: 20px; color: blue; font-weight: bold;''>Không có sản phẩm nào với từ khóa ".'"'.$key.'"'."</div>";
                    } ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>