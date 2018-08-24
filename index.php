<?php
require_once './app/Config.inc.php';
$categoryController = new CategoryController();
$categorySearch = $categoryController->parentList();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cial Central Implementos Agrícolas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" />
        <link rel="stylesheet" href="css/boot.css" type="text/css"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/jcarousel-wrapper.css" type="text/css"/>
        <link rel="stylesheet" href="css/jcarousel-column.css" type="text/css"/>

    </head>
    <body>
        <!--HEADER-->
        <main class="container bg-light">
            <div class="content">
                <div class="header-topo">
                    <div class="header_logo">
                        <h1 class="main_logo fl-left font-zero">
                            <a href="<?= HOME;?>" title="Home" class="radius">
                                Cial Cetral Implementos Agrícolas
                            </a>
                        </h1>
                    </div>

                    <div class="search-area">
                        <div class="search-menu al-right">
                            <ul>
                                <li><a href="#"><i class="fas fa-home"></i> Nossas Lojas</a></li> |
                                <li class="dropdown">
                                    <a href="#">English <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Português</a></li>
                                    </ul
                                </li>
                            </ul>
                        </div>

                        <div class="form-seach">
                            <form>
                                <select class="form-select">
                                    <?php 
                                        foreach ($categorySearch as $categ):
                                    ?>
                                    <option value="<?= $categ->category_id?>"><?= $categ->category_name;?></option>   
                                    <?php
                                         endforeach;
                                    ?>
                                </select>
                                <input type="text" placeholder="Pesquisar...">
                                <input type="submit">
                            </form>
                        </div>
                    </div>

                    <div class="header_cart">
                        <div class="row">
                            <div class="column column-4">
                                <div class="header_cart_info">
                                    <i class="icone fas fa-sign-in-alt"></i>
                                    <p>Login</p>
                                </div>
                            </div>
                            <div class="column column-4">
                                <div class="header_cart_info">
                                    <i class="icone fas fa-heart"></i>
                                    <p>Lista de Desejos</p>
                                </div>
                            </div>
                            <div class="column column-4">
                                <div class="header_cart_info">
                                    <i class="icone fas fa-cart-plus"></i>
                                    <p>(0)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </main>


        <div class="container bg-gray">
            <div class="menu-container">
                <div class="menu">
                    <ul>
                        <li>
                            <a class="menu-item" href="index.html">
                                <img src="images/menu/list.png">
                                <p>Ver Mais</p>
                            </a>
                        </li>
                        <!--                        <li>
                                                    <a class="menu-item" href="about.html">
                                                        <img src="images/menu/drill.png">
                                                        <p>Ferramentas Eletricas</p>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <ul>
                                                                <li><a href="#">Furadeiras</a></li>
                                                                <li><a href="#">Parafusadeiras</a></li>
                                                                <li><a href="#">Seras Mármore</a></li>
                                                                <li><a href="#">Marteletes</a></li>
                                                                <li><a href="#">Esmerilhadeiras</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <ul>
                                                                <li><a href="#">Serra Tico Tico</a></li>
                                                                <li><a href="#">Serra Circular de Bancada</a></li>
                                                                <li><a href="#">Serra Meia Esquadria</a></li>
                                                                <li><a href="#">Moto Esmeris</a></li>
                                                                <li><a href="#">Lixadeira</a></li>
                                                            </ul>
                                                        </li>
                        
                                                        <li>
                                                            <img src="tim.php?src=images/parafusadeiraFuradeira.jpg&w=200&h=200" />
                                                        </li>
                                                    </ul>
                        
                                                </li>-->
                        <!--                        <li>
                                                    <a class="menu-item" href="#">
                                                        <img src="images/menu/drill_p.png">
                                                        <p>Ferramentas a Bateria</p>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Elements-sub 1</a></li>
                                                        <li><a href="#">Elements-sub 2</a></li>
                                                        <li><a href="#">Elements-sub 3</a></li>
                                                    </ul>
                                                </li>-->                        
                        <?php
                        $sql = "SELECT * FROM categories WHERE category_parent IS NULL LIMIT 0,9";
                        $arrayCategories = array();
                        $listCategory = $categoryController->Pager($sql, $arrayCategories, true);
                        foreach ($listCategory as $category):
                            ?>
                            <li>
                                <a class="menu-item" href="categorias/<?= $category->category_url; ?>">
                                    <img src="upload/<?= $category->category_thumb; ?>">
                                    <p><?= $category->category_name ?></p>
                                </a>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div><!--MEGA MENU-->

        <!-- CONTEUDO -->
        <?php
        $Url[1] = (empty($Url[1]) ? null : $Url[1]);

        if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '.php';
        elseif (file_exists(REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php';
        else:
            require REQUIRE_PATH . '/404.php';
        endif;
        ?>
        <!-- CONTEUDO -->


        <!--FOOTER TOP-->
        <div class="container bg-light">
            <div class="content">
                <div class="row site-footer">
                    <div class="column column-3">
                        <h1>CONTATE-NOS</h1>
                    </div>
                    <div class="column column-3">
                        <h1>SERVIÇO AO CLIENTE</h1>
                        <ul>
                            <li><a href="#">Minha Conta</a></li>
                            <li><a href="#">Listas de Desejos</a></li>
                            <li><a href="#">Confira</a></li>
                            <li><a href="#">Entrar</a></li>
                        </ul>
                    </div>
                    <div class="column column-3">
                        <h1>CORPORAÇÃO</h1>
                        <ul>
                            <li><a href="#">Minha Conta</a></li>
                            <li><a href="#">Listas de Desejos</a></li>
                            <li><a href="#">Confira</a></li>
                            <li><a href="#">Entrar</a></li>
                        </ul>
                    </div>
                    <div class="column column-3">
                        <h1>PORQUE ESCOLHER-NOS</h1>
                        <ul>
                            <li><a href="#">Minha Conta</a></li>
                            <li><a href="#">Listas de Desejos</a></li>
                            <li><a href="#">Confira</a></li>
                            <li><a href="#">Entrar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!--FOOTER TOP-->

        <!--FOOTER BOTTOM-->
        <div class="container bg-gray">
            <div class="content">
                <div class="footer-menu">
                    <div class="menu-footer-left">
                        <ul>
                            <li><a href="#"><i class="shoticon shoticon-facebook"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-instagram"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="menu-footer-right">
                        <ul>
                            <li><a href="#"><i class="shoticon shoticon-pagseguro"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-american"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-diners"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-mastercard"></i></a></li>
                            <li><a href="#"><i class="shoticon shoticon-visa"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--FOOTER BOTTOM-->

        <script src="js/jquery.min.js"></script>
        <script src="js/slider_g.js"></script>
        <script src="js/fontawesome.js"></script>
        <script src="js/jcarousel.min.js" type="text/javascript"></script>
        <script src="js/jcarousel.responsive.js"></script>
        <script src="js/jcarousel.column.js"></script>
        <script src="js/mySlider.js"></script>
        <script src="js/blogcarousel.js"></script>
        <script>
            var slideIndex, slide, dots, captionText;
            function iniGallery() {
                slideIndex = 0;
            }
        </script>

        <script>
            $(document).ready(function () {
                "use strict";
                $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
                $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
                $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");
                $(".menu > ul > li").hover(function (e) {
                    if ($(window).width() > 943) {
                        $(this).children("ul").stop(true, false).fadeToggle(150);
                        e.preventDefault();
                    }
                });

                $(".menu > ul > li").click(function () {
                    if ($(window).width() <= 943) {
                        $(this).children("ul").fadeToggle(150);
                    }
                });
                $(".menu-mobile").click(function (e) {
                    $(".menu > ul").toggleClass('show-on-mobile');
                    e.preventDefault();
                });
            });
        </script>
    </body>
</html>