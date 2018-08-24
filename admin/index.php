<?php
require_once '../app/ConfigAdmin.inc.php';
$AdminLevel = 8;

if ($_SESSION['level'] < $AdminLevel):
    $insertGoTo = 'login.php';
    header("refresh:5;url={$insertGoTo}");
    session_destroy();
    die('<div style="text-align: center; margin: 5% 0; color: #C54550; font-size: 1.6em; font-weight: 400; background: #fff; float: left; width: 100%; padding: 30px 0;"><b>ACESSO NEGADO:</b> Você não esta logado<br>ou não tem permissão para acessar essa página! </div>');
endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Painel Administrativo</title>
        <link href="<?= INCLUDE_PATH;?>/css/boot.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH;?>/css/painel.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container">
            <div class="admin-left">                
                <div class="admin-left-thumb">
                    <div class="admin-thumb">
                        <img src="<?= INCLUDE_PATH;?>/images/man.png" alt=""/>
                    </div>
                    <h1>Seja Bem-vindo<br> <?= $_SESSION["name"]; ?></h1>
<!--                    <form>
                        <input type="file"><input type="submit">
                    </form>-->
                </div>

                <div class="admin-left-menu">
                   <?php require_once './inc/menu.php'; ?>
                </div>

                <div class="clear"></div>
            </div>

            <div class="admin-right">
                <header class="admin-right-header">                    
                    <div class="admin-header-top">  
                        <div class="admin-header-left">
                            <p>Bem-vindo(a) ao Work Controle, Hoje <?php echo date('d/m/Y');?></p>
                        </div>                        
                        <div class="admin-header-right">
                            <a href="<?= HOME;?>/logout">
                                <img class="exit" src="<?= INCLUDE_PATH;?>/images/exit.png"> Sair
                            </a>
                        </div>
                    </div>
                </header>

                <hr class="linha">

                <footer class="admin-header-footer">                    
                    <div class="painel">
                        <img src="<?= INCLUDE_PATH;?>/images/house-outline.png"><h1>Painel Administrativo</h1>
                        <p>Work Controller / <a href="#">Painel</a></p>
                    </div>                    
                </footer>  
                
                <hr class="linha">

                <div class="clear"></div>

                <!--CONTEUDO DO SITE-->
                <div class="conteudo-row">
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
                    </div>
                <!--CONTEUDO DO SITE-->

                <div class="footer bg-azul">
                    <div class="content">
                        <p><?= date("Y") ?> - Todos os direitos reservados</p>
                    </div>
                </div>

                <div class="clear"></div>
            </div>


        </div>
    </body>
    <script src="<?= INCLUDE_PATH;?>/js/jquery-2.2.4.js" type="text/javascript"></script>
    <script src="<?= INCLUDE_PATH;?>/js/fontawesome.js" type="text/javascript"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="<?= INCLUDE_PATH;?>/js/ajax.js" type="text/javascript"></script>
    <script src="<?= INCLUDE_PATH;?>/js/previewImage.js" type="text/javascript"></script>
    <!--FUNÇÃO PARA PERSONALIZAÇÃO OS TEXTOS-->
    <script src="<?= INCLUDE_PATH;?>/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="<?= INCLUDE_PATH;?>/js/tinymce_funcao.js" type="text/javascript"></script>
</html>
