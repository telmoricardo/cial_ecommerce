<?php
$brandController = new BrandController();
$productControler = new ProductController();
$lstBrand = $brandController->listBrands();
$helper = new Helper();
?>
<!--slider-->
<section class="slider container">
    <h1 class="font-zero">Últimas do site:</h1>
    <div class="slider_controll">
        <div class="slide_nav back"><i class="fas fa-angle-left"></i></div>
        <div class="slide_nav go"><i class="fas fa-angle-right"></i></div>
    </div>
    <article class="slider_item first">
        <a href="ver" title="Fortaleza">
            <img src="tim.php?src=images/01-3.jpg&w=1600&h=500" alt="" title="">
        </a>
        <div class="slider_item_desc">
            <h1>Motosserras STIHL</h1>
            <p class="tagline">Tecnologia inovadora em motosserras para facilitar o trabalho.</p>
            <a class="btn btn-green" href="#">VEJA AGORA</a>
        </div>

    </article>

    <article class="slider_item">
        <a href="#ver" title="Fortaleza">
            <picture alt="Fortaleza">
                <source media="(min-width:1600px)" srcset="tim.php?src=uploads/01.jpg&w=200&h=600">
            </picture>
            <img src="tim.php?src=images/02-4.jpg&w=1600&h=500" alt="" title="">
        </a>
        <div class="slider_item_desc">
            <h1>Roçadeiras STIHL</h1>
            <p class="tagline">Um modelo para cada necessidade.</p>
            <a class="btn btn-green" href="#">VEJA AGORA</a>
        </div>
    </article>
</section>
<!--slider-->

<div class="container bg-body">
    <div class="content">
        <div class="row">
            <div class="column column-3">
                <!--CATEGORIAS-->
                <section class="sidebar">
                    <h1><i class="fas fa-align-justify"></i> Categorias</h1>
                    <ul class="sidebar_menu">
                        <?php
                        if($lstBrand == null):
                            echo 'Não existe fabricante registrado no momento';
                        else:
                            foreach ($lstBrand as $brand):
                            ?>
                            <li><a href="<?= HOME?>/brands/<?= $brand->brand_url?>" title="<?= $brand->brand_name?>"><?= $brand->brand_name?> </a> </li>       
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
                    <article class="hot_deals_text">
                        <img src="images/04.jpg" alt="" title="">
                        <div class="hot_deals_off">
                            <p class="off">39%</p>
                            <p>Desconto</p>
                        </div>
                        <h2>Floral Print Buttoned</h2>

                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>R$ 00,00</p>
                        <a href="#" class="btn btn-green">Veja Mais</a>
                    </article>
                    <div class="clear"></div>
                </section>
                <!--OFERTAS-->

                <!--PRODUCTS-->
                <section class="list-products">
                    <div class="list-products-header">
                        <h1>Produtos</h1>
                        <div class="product_controll">
                            <div class="slide_product back"><i class="fas fa-angle-left"></i></div>
                            <div class="slide_product go"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="product_slider first">
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <article class="list-products-item">
                                <a href="#">
                                    <div class="products-item-thumb">
                                        <img src="tim.php?src=images/03.jpg&w=300&h=300&zc=0" alt=""/>
                                    </div>
                                    <div class="products-item-text">
                                        <h1>Floral Print Buttoned <?= $i ?></h1>
                                        <p>R$ 00,00</p>
                                        <p>R$ 00,00</p>
                                    </div>
                                </a>
                            </article>
                        <?php endfor; ?>
                    </div>

                    <div class="product_slider">
                        <?php for ($i = 4; $i <= 6; $i++): ?>
                            <article class="list-products-item">
                                <a href="#">
                                    <div class="products-item-thumb">
                                        <img src="tim.php?src=images/03.jpg&w=300&h=300&zc=0" alt=""/>
                                    </div>
                                    <div class="products-item-text">
                                        <h1>Floral Print Buttoned <?= $i ?></h1>
                                        <p>R$ 00,00</p>
                                        <p>R$ 00,00</p>
                                    </div>
                                </a>
                            </article>
                        <?php endfor; ?>
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
                        <h1>Classificação</h1>
                        <div class="product_controll">
                            <div class="slide_product back"><i class="fas fa-angle-left"></i></div>
                            <div class="slide_product go"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="product_slider first">
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <article class="list-products-item">
                                <a href="#">
                                    <div class="products-item-thumb">
                                        <img src="tim.php?src=images/03.jpg&w=300&h=300&zc=0" alt=""/>
                                    </div>
                                    <div class="products-item-text">
                                        <h1>Floral Print Buttoned <?= $i ?></h1>
                                        <div class="star" style="margin-bottom: 10px;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>R$ 00,00</p>
                                    </div>
                                </a>
                            </article>
                        <?php endfor; ?>
                    </div>
                    <div class="product_slider">
                        <?php for ($i = 4; $i <= 6; $i++): ?>
                            <article class="list-products-item">
                                <a href="#">
                                    <div class="products-item-thumb">
                                        <img src="tim.php?src=images/03.jpg&w=300&h=300&zc=0" alt=""/>
                                    </div>
                                    <div class="products-item-text">
                                        <h1>Floral Print Buttoned <?= $i ?></h1>
                                        <div class="star" style="margin-bottom: 10px;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>R$ 00,00</p>
                                    </div>
                                </a>
                            </article>
                        <?php endfor; ?>
                    </div>
                </section><!--TOP RATED PRODUCTS-->
            </div>

            <div class="column column-9">
                <!--slider-->
                <section class="conteudo">
                    <!--NEW PRODUCTS-->
                    <section class="new-products">
                        <div class="new-products-header">
                            <h1>Novos Produtos</h1>
                            <div class="new-products-nav">
                                <a href="#" class="control-prev"><</a>
                                <a href="#" class="control-next">></a>
                            </div>
                        </div>
                        <div class="new-products-body">
                            <article class="wrapper">
                                <div class="jcarousel-wrapper">
                                    <?php
                                        $newsProducts = $productControler->newProduct();
                                            if($newsProducts == null):
                                                echo '<div class="container"><div class="trigger trigger-error">Não existe produtos cadastrados como novo</div></div>';
                                            else:
                                        ?>
                                    <div class="jcarousel">
                                        
                                        <ul>
                                            <?php                                           
                                            
                                            foreach ($newsProducts as $news) :
                                                ?>
                                                <li class="item">
                                                    <img src="tim.php?src=../upload/<?= $news->product_thumb;?>&w=400&h=400&zc=0" alt=""/>
                                                    <h1 class="title"><?= Helper::limitarTexto($news->product_name, 50);?></h1>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <p>R$ <?= number_format($news->product_price, 2, ",", ".");?></p>

                                                    <div class="action">
                                                        <a href="<?= $i ?>" class="action_item active">
                                                            <icon class="fa fa-shopping-cart"></icon>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="fas fa-align-right"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php endforeach;?>
                                        </ul>
                                        
                                    </div>
                                    <?php
                                         endif;
                                        ?>
                                </div>
                            </article>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!--NEW PRODUCTS-->


                    <!--FEATURED PRODUCTS-->
                    <section class="featured-products">
                        <div class="featured-products-header">
                            <h1>Destaque do mês</h1>
                        </div>

                        <div class="featured-products-body">
                            <article class="featured-products-item">
                                <a href="#">
                                    <img src="tim.php?src=images/products/parafusadeira.jpg&w=300&h=300&zc=0" alt=""/>
                                    <h1 class="title">Parafusadeira Hp330dbr C/ 3 Baterias 12v Car Bi-volt Makita</h1>

                                    <div class="star">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <div class="featured-products-item-description">
                                        <p>Por apenas</p>
                                        <h2>R$ 399,90</h2>
                                        <p>ou 5x de R$ 79,80 s/ juros</p>
                                        <a href="#" class="btn btn-green">Comprar</a>
                                    </div>
                                </a>
                            </article>

                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/serra-marmore.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Serra Mármore Bosch Titan 1.500w Gdc151 C/ Maleta + 3 Discos</h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>

                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/kit-ferramenta.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Jogo Kit Caixa Ferramentas 117 Peças Com Maleta Eda e acessórios </h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/pistola-pulverizadora.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Pistola Pulverizadora para Pintura Elétrica - Ferrari MS-350 350W 800ml</h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/furadeira.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Furadeira e Parafusadeira Elétrica Bosch 12V - Velocidade Variável Mandril</h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/esmeril.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Moto Esmeril Motomil 6 - MMI-50 360W 110V + 3 Discos</h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/compressor.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Compressor de Ar Tekna 2.0HP - 24 Litros CP8525 - 110</h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                            <article class="featured-products-item">
                                <img src="tim.php?src=images/products/martelete.jpg&w=300&h=300&zc=0" alt=""/>
                                <h1 class="title">Martelete Tramontina Perfurador e Rompedor 1050W </h1>

                                <div class="star">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="featured-products-item-description">
                                    <p>Por apenas</p>
                                    <h2>R$ 399,90</h2>
                                    <p>ou 5x de R$ 79,80 s/ juros</p>
                                    <a href="#" class="btn btn-green">Comprar</a>
                                </div>
                            </article>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!--FEATURED PRODUCTS-->


                    <!--TOP RATED PRODUCTS-->
                    <section class="top-rated-products">
                        <div class="top-rated-header">
                            <h1>PRODUTOS COM MELHOR CLASSIFICAÇÃO</h1>
                            <div class="top-rated-nav">
                                <a href="#" class="slick-prev"><</a>
                                <a href="#" class="slick-next">></a>
                            </div>
                        </div>
                        <div class="top-rated-body">
                            <?php for ($i = 0; $i <= 5; $i++): ?>
                                <article class="top-rated-product-item">
                                    <a href="#">
                                        <div class="product-item-desc">
                                            <div class="product-item-thumb">
                                                <img src="tim.php?src=images/03.jpg&w=300&h=300&zc=0" alt=""/>
                                            </div>
                                            <div class="product-item-text">
                                                <h1 class="title">Roçadeira FS 85</h1>
                                                <div class="star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>R$ 00,00</p>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            <?php endfor; ?>
                        </div>
                    </section>

                    <!--blog-->
                    <section class="blog">
                        <div class="blog-header">
                            <h1>MAIS RECENTE BLOG</h1>
                            <div class="blog-nav">
                                <a href="#" class="ctrl-prev"><</a>
                                <a href="#" class="ctrl-next">></a>
                            </div>
                        </div>
                        <div class="blog-body">

                            <article class="blog-article">
                                <div class="jcarousel-blog">
                                    <div class="blogcarousel">
                                        <ul>
                                            <?php
                                            for ($i = 1; $i <= 3; $i++):
                                                ?>
                                                <li>
                                                    <img src="tim.php?src=images/blog_0<?= $i ?>.jpg&w=900&h=500&zc=0" alt=""/>
                                                    <h1 class="title">Nemo enim ipsam voluptatem quia voluptas sit aspernaturs</h1>
                                                    <p>Por: CkThemes | 12 Julho de 2018</p>
                                                    <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur... </p>

                                                    <a href="#" class="btn_read btn btn-green radius">Leia Mais</a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </article>

                        </div>
                        <div class="clear"></div>
                    </section>
                    <!--blog-->

                    <!--BEST SELLER-->
                    <section class="new-products">
                        <div class="new-products-header">
                            <h1>MAIS VENDIDOS</h1>
                            <div class="new-products-nav">
                                <a href="#" class="control-prev"><</a>
                                <a href="#" class="control-next">></a>
                            </div>
                        </div>
                        <div class="new-products-body">
                            <article class="wrapper">
                                <div class="jcarousel-wrapper">
                                    <div class="jcarousel">
                                        <ul>
                                            <?php
                                            for ($i = 0; $i <= 5; $i++):
                                                ?>
                                                <li class="item">
                                                    <img src="tim.php?src=images/01.jpg&w=300&h=300&zc=0" alt=""/>
                                                    <div class="best_off">
                                                        <p class="off">VENDA</p>
                                                    </div>
                                                    <h1 class="title">Roçadeira FS 85</h1>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <p>R$ 00,00</p>

                                                    <div class="action">
                                                        <a href="<?= $i ?>" class="action_item active">
                                                            <icon class="fa fa-shopping-cart"></icon>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="action_item">
                                                            <i class="fas fa-align-right"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!--BEST SELLER-->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>