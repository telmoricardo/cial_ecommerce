<?php 
$categoryController = new CategoryController();


/** Pegando o cod que esta vindo através da url del * */
$deletar = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
$arrayDeletar = array($deletar);
$qtdSubcategories = $categoryController->returnQtdSubcategory($arrayDeletar, true);
$quantitySubcategories = count($qtdSubcategories);
if ($deletar):

    if ($quantitySubcategories == 0):

        $returnImage = $categoryController->fieldCategory("category_id", $deletar);

        if ($returnImage):
            $capa = "../upload/" . $returnImage->category_thumb;
            if (file_exists($capa) && !is_dir($capa)):
                unlink($capa);
            endif;
            
            if ($categoryController->Excluir("category_id", $deletar)):
                echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Categoria removida com sucesso!")
                </SCRIPT>';
            
            else:
                echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Error ao remover a categoria!")
            </SCRIPT>';
            endif;
        endif;


    else:
        echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert ("Possui categorias cadastradas. Para deletar, antes altere ou remova as categorias filhas!")
            </SCRIPT>';
    endif;
endif;

//máximo de links na paginação
$maxlinks = 4;
$pagina = (isset($_GET['pagina'])) ? ($_GET['pagina']) : 1;
//quantidade de publicação por páginas
$maximo = 5;
$inicio = (($maximo * $pagina) - $maximo);

//litando as categorias Pai
$sql = "SELECT * FROM categories WHERE category_parent IS NULL LIMIT {$inicio}, {$maximo}";
$arrayParams = array();
$listaCatPai = $categoryController->Pager($sql, $arrayParams, true);



?>
<div class="container">

    <section class="content">

        <h1>Categorias:</h1>

        <?php 
            
            if($listaCatPai == null):
                echo '<div class="trigger trigger-error"><p><b class="trigger-accept-bold">Atenção: </b>Não possui categoria cadastrada nesse momento</p></div>';
            else:
                foreach ($listaCatPai as $catPai):                
        ?>
        <header class="category-header">            
            <h1>
                <?php 
                    $arrayParams = array($catPai->category_id);
                    $listaSubcategory = $categoryController->returnCategory($arrayParams, true);
                    $qtsCat = count($listaSubcategory);
                ?>
                <?= $catPai->category_name; ?>: <span>( 21 posts ) ( <?= $qtsCat ?> Categorias )</span>
                <a href="<?= HOME; ?>/categories/index&del=<?= $catPai->category_id; ?>" onclick="return confirm('Deseja realmente excluir o produto <?= $catPai->category_name; ?>');" title="Excluir" class="btn-delete"></a>
                <a href="<?= HOME; ?>/categories/update&id=<?= $catPai->category_id; ?>" title="Atualizar" class="btn-update"></a>
            </h1>

            <table class="table table-responsive">
                <?php
                $arrayParams = array($catPai->category_id);
                $listaSubcategory = $categoryController->returnCategory($arrayParams, true);
                if ($listaSubcategory == NULL):
                    echo '<td colspan="4">Não existe subcategoria cadastrada nessa categoria</td>';
                else:
                    ?>
                    <thead>
                        <tr>
                            <td>Subcategoria</td>
                            <td>Quant. Post</td>
                            <td>Status</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>                 
                        <?php
                        foreach ($listaSubcategory as $subcat):
                            ?>
                            <tr>
                                <td><?= $subcat->category_name; ?></td>
                                <td>7 posts</td>
                                <td>
                                    <?= ($subcat->category_status) == 1 ? "Ativo" : "Bloqueado"; ?>
                                </td>
                                <td>
                                    <a href="<?= HOME; ?>/categories/index&del=<?= $subcat->category_id ?>" title="Excluir" class="btn-delete" onclick="return confirm('Deseja realmente excluir o produto <?= $subcat->category_name; ?>');"></a>
                                    <a href="<?= HOME; ?>/categories/update&id=<?= $subcat->category_id; ?>" title="Atualizar" class="btn-update"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>                    
                    </tbody>
                <?php endif; ?>
            </table>         
        </header>
        <hr style="margin: 8px 0; border: 1px solid #ccc; color: #fff;">
        <?php
                endforeach;
            endif;
        ?>      

       <?php
            //paginação de resultados
            $total = $categoryController->RetornaQtdCategory();
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

        <div class="clear"></div>
    </section>
    

    <div class="clear"></div>
</div> <!-- content home -->