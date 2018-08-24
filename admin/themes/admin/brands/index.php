<?php
$brandController = new BrandController();

/** Pegando o cod que esta vindo através da url del * */
$deletar = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
//vai verificar a quantidade de produtos relacionada a esta marca antes de excluir
//echo $quantityCategories = $categoryController->RetornaQtdCategory($deletar);
if ($deletar):
//    if ($quantityCategories == 0):
        if ($brandController->Excluir("brand_id", $deletar)):            
            echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Marca removida com sucesso!")
                </SCRIPT>';
            $insertGoTo = HOME."/brands/index";
            header("refresh:2;url={$insertGoTo}");
        else:
            echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Error ao remover a marca!")
            </SCRIPT>'; 
             $insertGoTo = HOME."/brands/index";
            header("refresh:2;url={$insertGoTo}");
        endif;
//    else:
//        echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
//            alert ("Possui categorias cadastradas. Para deletar, antes altere ou remova as categorias filhas!")
//            </SCRIPT>';
//    endif;
endif;

//máximo de links na paginação
$maxlinks = 4;
$pagina = (isset($_GET['pagina'])) ? ($_GET['pagina']) : 1;
//quantidade de publicação por páginas
$maximo = 10;
$inicio = (($maximo * $pagina) - $maximo);

//listando as marcas
$listBrands = $brandController->allBrands($inicio,$maximo);
?>
<div class="post-conteudo container">                   
    <div class="cad-form">
        <h1>Listar Marcas</h1>
        <table class="table table-responsive">
            <?php 
                if($listBrands == null):
                    echo '<div style="width: 96%; margin: 0 2%; margin-top: 10px;" class="trigger trigger-error">Não possui registros no momento</div>';
                else:                    
            ?>
            <thead>                
                <tr>
                    
                    <td>Cod</td>
                    <td>Titulo</td>                    
                    <td>Status</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listBrands as $brand):
                    ?>
                    <tr>
                        <td><?= $brand->brand_id;?></td>
                        <td><?= $brand->brand_name;?></td>    
                        
                        <td><?= ($brand->brand_status) == 1 ? 'Ativo' : 'Bloqueado'?></td>
                        <td>
                            <a href="<?= HOME; ?>/brands/index&del=<?= $brand->brand_id; ?>" onclick="return confirm('Deseja realmente excluir o produto <?= $brand->brand_name; ?>');" title="Excluir" class="btn-delete"></a>
                            <a href="<?= HOME; ?>/brands/update&id=<?= $brand->brand_id; ?>" title="Atualizar" class="btn-update"></a>
                        </td>
                    </tr>

                    <?php
                endforeach;
                ?>
            </tbody>
            <?php
            
                endif;
                ?>
        </table>


        <?php
            //paginação de resultados
            $total = $brandController->countBrand();
            $total_paginas = ceil($total / $maximo);
            if ($total > $maximo):                
                echo '<div class="paginator">';
                echo '<ul class="pagination">';
                    echo '<li><a href="index&pagina=1">Primeira Página</a></li>';
                    for ($i = $pagina - $maxlinks; $i <= $pagina - 1; $i++):
                        if ($i >= 1):
                            echo '<li><a href="index&pagina=' . $i . '">' . $i . '</a><li>';
                        endif;
                    endfor;
                    echo '<li><a class="active" href="index&pagina=' . $pagina . '">' . $pagina . '</a></li>';
                    for ($i = $pagina + 1; $i <= $pagina + $maxlinks; $i++):
                        if ($i <= $total_paginas):
                            echo '<li><a href="index&pagina=' . $i . '">' . $i . '</a></li>';
                        endif;
                    endfor;
                    echo '<li><a href="index&pagina=' . $total_paginas . '"">Última Página</a></li>';
                echo '</ul>';
                echo '</div>';
            endif;            
            ?>
    </div>


    <div class="clear"></div>
</div>
