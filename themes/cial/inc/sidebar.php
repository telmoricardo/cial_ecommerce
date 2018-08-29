<?php
$brandController = new BrandController();
$productControler = new ProductController();
$lstBrand = $brandController->listBrands();
$helper = new Helper();
?>
<!--CATEGORIAS-->
<section class="sidebar">
    <h1><i class="fas fa-align-justify"></i> Fabricantes</h1>
    <ul class="sidebar_menu">
        <?php
        if ($lstBrand == null):
            echo 'Não existe fabricante registrado no momento';
        else:                    
            foreach ($lstBrand as $brand):
                ?>             
                <li><a href="<?= HOME ?>/marca/<?= $brand->brand_url ?>" title="<?= $brand->brand_name ?>"><?= $brand->brand_name ?> </a> </li>       
                <?php
                
            endforeach;
        endif;
        ?>

    </ul>
</section>
<!--CATEGORIAS-->

<!--OFERTAS-->
<section class="hot_deals">
    <h1>OFERTAS QUENTES</h1>
    
    <?php
        $sql = "SELECT * FROM products WHERE product_offer = ? AND product_status = ? ORDER BY RAND() LIMIT 0,1";
        $arrayParams = array(1, 1);
        $ofterProducts = $productControler->SQLProduct($sql, $arrayParams, true);
        if($ofterProducts == null):
            
        else:
            foreach ($ofterProducts as $offer):
    ?>
    <article class="hot_deals_text">
        <img src="<?= HOME ?>/tim.php?src=upload/<?= $offer->product_thumb; ?>&w=250&h=250&zc=0" alt="<?= $offer->product_name?>" title="<?= $offer->product_name?>">
        <div class="hot_deals_off">
            <!--((V2-V1)/V1 × 100)-->
            <?php
                $desconto = round((($offer->product_price_from - $offer->product_price)/$offer->product_price_from) * 100);
            ?>
            <p class="off"><?= $desconto;?>%</p>
            <p>Desconto</p>
        </div>
        <h2><?= $helper->limitarTexto($offer->product_name, 45); ?></h2>

        <div class="barra">
            <div class="stars">                                                        
                <?php
                if ($offer->product_rating != '0'):
                    for ($i = 1; $i <= intval($offer->product_rating); $i++):
                        ?>                                                       
                        <i class="icons fas fa-star"></i>
                        <?php
                    endfor;
                else:
                    echo '<i class="icons far fa-star"></i>';
                    echo '<i class="icons far fa-star"></i>';
                    echo '<i class="icons far fa-star"></i>';
                    echo '<i class="icons far fa-star"></i>';
                    echo '<i class="icons far fa-star"></i>';
                endif;
                ?>                                                        
            </div>
        </div>
        <?php 
            if ($offer->product_sale == 1):                                                                
                if ($offer->product_offer == 1):
                    echo '<div class="message message-accept"><span class="valor_product"> R$ ' . number_format($offer->product_price, 2, ",", ".").'</span></div>';
                else:
                    echo '<div class="message message-accept"><span class="valor_product"> R$ ' . number_format($offer->product_price_from, 2, ",", ".").'</span></div>';
                endif;                                                               
            else:
                echo '<div class="message message-infor">Maiores informações pelo Chat</div>';
        endif;
        ?>  
        <a href="<?= HOME?>/single/<?= $offer->product_url; ?>" style="width: 100%;" class="btn btn-green">Veja Mais</a>
    </article>
    
    
    <?php
        endforeach;
    endif;
    ?>
    
    <div class="clear"></div>
</section>
<!--OFERTAS-->

<!--PRODUCTS-->
<section class="list-products">
    <div class="list-products-header">
        <h1>Produtos a venda</h1>
        <div class="product_controll">
            <div class="slide_product back"><i class="fas fa-angle-left"></i></div>
            <div class="slide_product go"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
    <div class="product_slider first">
        <?php 
            $sql = "SELECT * FROM products WHERE product_sale = ? AND product_status = ? LIMIT 0,3";
            $arrayParams = array(1, 1);
            $listarProducts = $productControler->SQLProduct($sql, $arrayParams, true);
            if($listarProducts == null):   
                echo '<div class="container"><div class="trigger trigger-infor">Não possui produtos</div></div>';
            else:
                foreach ($listarProducts as $prod):
            ?>
            <article class="list-products-item">
                <a href="<?= HOME?>/single/<?= $prod->product_url; ?>">
                    <div class="products-item-thumb">
                        <img src="<?= HOME ?>/tim.php?src=upload/<?= $prod->product_thumb; ?>&w=300&h=300&zc=0" alt=""/>
                    </div>
                    <div class="products-item-text">
                        <h1><?= $helper->limitarTexto($prod->product_name, 45); ?></h1>
                        <?php 
                            if($prod->product_offer == 1):
                                echo 'R$ '.number_format($prod->product_price, 2, ",", ".");
                            else:
                                echo 'R$ '.number_format($prod->product_price_from, 2, ",", ".");
                            endif;                                   
                        ?>                 
                    </div>
                </a>
            </article>
        <?php 
            endforeach;
        endif;
        ?>
    </div>

    <div class="product_slider">
        <?php 
            $sql = "SELECT * FROM products WHERE product_sale = ? AND product_status = ? LIMIT 4,6";
            $arrayParams = array(1, 1);
            $listarProducts = $productControler->SQLProduct($sql, $arrayParams, true);
            if($listarProducts == null): 
                echo '<div class="container"><div class="trigger trigger-infor">Não possui produtos</div></div>';
            else:
                foreach ($listarProducts as $prod):
            ?>
            <article class="list-products-item">
                <a href="<?= HOME?>/single/<?= $prod->product_url; ?>">
                    <div class="products-item-thumb">
                        <img src="tim.php?src=upload/<?= $prod->product_thumb; ?>&w=300&h=300&zc=0" alt=""/>
                    </div>
                    <div class="products-item-text">
                        <h1><?= $helper->limitarTexto($prod->product_name, 45); ?></h1>
                        <?php 
                            if($prod->product_offer == 1):
                                echo 'R$ '.number_format($prod->product_price, 2, ",", ".");
                            else:
                                echo 'R$ '.number_format($prod->product_price_from, 2, ",", ".");
                            endif;                                   
                        ?>                 
                    </div>
                    
                </a>
            </article>
        <?php 
            endforeach;
        endif;
        ?>
    </div>
</section>
<!--PRODUCTS-->

<!--TAGS-->
<section class="list-products">
    <div class="list-products-header">
        <h1>TAGS DE PRODUTO</h1>
    </div>
    <div class="tags-products-body">
        <ul>
            <li><a href="#">MOTOSSERRAS</a></li>
            <li><a href="#">ROÇADEIRAS</a></li>
            <li><a href="#">PODADORES</a></li>
            <li><a href="#">CORTADORES DE GRAMA</a></li>
            <li><a href="#">SOPRADORES</a></li>
            <li><a href="#">MOTOPODA</a></li>
            <li><a href="#">VARREDEIRA</a></li>
            <li><a href="#">COLHEDOR DE OLIVA</a></li>
        </ul>

    </div>
</section>
<!--TAGS-->

<!--TOP RATED PRODUCTS-->
<section class="list-products">
    <div class="list-products-header">
        <h1>Os mais vistos</h1>        
    </div>
    
    <?php 
        $sql = "SELECT * FROM products WHERE product_status = ? AND product_view >= 10 LIMIT 0,3";
        $arrayParams = array(1);
        $listarProducts = $productControler->SQLProduct($sql, $arrayParams, true);
        if($listarProducts == null): 
            echo '<div class="container"><div class="trigger trigger-infor">Não possui produtos</div></div>';
        else:
            foreach ($listarProducts as $prod):
    ?>
    
        <article class="list-products-item">
                <a href="<?= HOME?>/single/<?= $prod->product_url; ?>">
                    <div class="products-item-thumb">
                        <img src="<?= HOME?>/tim.php?src=upload/<?= $prod->product_thumb; ?>&w=300&h=300&zc=0" alt=""/>
                    </div>
                    <div class="products-item-text">
                        <h1><?= $helper->limitarTexto($prod->product_name, 45); ?></h1>
                        <?php
                            if ($prod->product_sale == 1):
                                if ($prod->product_offer == 1):
                                    echo 'R$ ' . number_format($prod->product_price, 2, ",", ".");
                                else:
                                    echo 'R$ ' . number_format($prod->product_price_from, 2, ",", ".");
                                endif;
                                else:
                                    echo 'Consulte um dos nossos devendores';
                            endif;
                            ?>                                       
                    </div>
                    
                </a>
            </article>
    <?php 
        endforeach; 
        endif;
    ?>
    
    
</section><!--TOP RATED PRODUCTS-->