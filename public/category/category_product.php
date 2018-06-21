<?php
    $id_cate=(string)$_GET['id_cate'];
?>
 <div class="search-result-container ">
    <div id="myTabContent" class="tab-content category-list">
        <div class="tab-pane active " id="grid-container">
            <div class="category-product">
                <div class="row">
                                            <?php
                                            if (isset($_GET['page'])) {
                                                        $trang = $_GET['page'];
                                                    }
                                                    else $trang =1;
                                                    $number = 6;
                                                    $from=($trang -1)*$number;
                                                include_once 'class.php';
                                                $a=new cate();
                                                $show=$a->getbyidobj($id_cate,$from,$number);
                                                foreach ($show as $key){
                                                ?>
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="detail.php?id=<?=$key->id?>"><img  src="Upload/<?=$key->image?>" alt=""></a> </div>
                                                            <div class="tag sale"><span>sale</span></div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"> <?=number_format(($key->price-($key->price*$key->discount/100)))?>  </span> <span class="price-before-discount"><?=number_format($key->price)?></span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div style="text-align: center;">
                            <ul class="pagination">
                                <li><?php
                                    if($trang>1 && count($show)>=1){
                                        echo '<a href="index.php?p=category/category_product.php&id_cate='.$id_cate.'&page='.($trang-1).'">Previous</a>';
                                    }
                                ?></li>
                            <?php for($i=1;$i<=$show[0]->sotrang;$i++) {?>
                            <li class="page-item <?= $i==$trang ? "active" :"" ?> "><a href="index.php?p=category/category_product.php&id_cate=<?=$id_cate?>&page=<?=$i?>" ><?=$i?></a></li>
                            <?php } ?>
                            <li>
                                <?php
                                    if($trang<$show[0]->sotrang && count($show)>=1){
                                        echo '<a href="index.php?p=category/category_product.php&id_cate='.$id_cate.'&page='.($trang+1).'">Next</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>