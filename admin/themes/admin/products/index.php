<?php
$productControler = new ProductController();
$brandController = new BrandController();

/** Pegando o cod que esta vindo através da url del * */
$deletar = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
//vai verificar a quantidade de produtos relacionada a esta marca antes de excluir
//echo $quantityCategories = $categoryController->RetornaQtdCategory($deletar);
if ($deletar):
    $returnThumb = $productControler->findProduct("product_id", $deletar);
    
    if ($returnThumb):
        $capa = "../upload/" . $returnThumb->product_thumb;
        if (file_exists($capa) && !is_dir($capa)):
            unlink($capa);
        endif;

        if ($productControler->Excluir("product_id", $deletar)):

            echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Produto removido com sucesso!")
                </SCRIPT>';
            $insertGoTo = HOME . "/products/index";
            header("refresh:2;url={$insertGoTo}");
        else:
            echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert ("Error, ao tentar deletar produto!")
                </SCRIPT>';
        endif;
    endif;


endif;

//máximo de links na paginação
$maxlinks = 4;
$pagina = (isset($_GET['pagina'])) ? ($_GET['pagina']) : 1;
//quantidade de publicação por páginas
$maximo = 10;
$inicio = (($maximo * $pagina) - $maximo);

//listando as marcas
$listProduct = $productControler->allProduct($inicio, $maximo);
?>
<div class="post-conteudo container">                   
    <div class="cad-form" style="text-align: center;">
        <h1>Listar Produtos</h1>
        <table class="table table-responsive" >
            <?php 
                if($listProduct == null):
                    echo '<div style="width: 96%; margin: 0 2%; margin-top: 10px;" class="trigger trigger-error">Não possui registros no momento</div>';
                else:                    
            ?>
            <thead>                
                <tr>                    
                    <td>Foto</td>
                    <td>Titulo</td>                    
                    <td>Categoria</td>                    
                    <td>Fabricante</td>                    
                    <td>Destaque</td>                    
                    <td>Venda</td>                    
                    <td>Promoção</td>                    
                    <td>Status</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listProduct as $product):
                    ?>
                    <tr>
                        <td><?= $product->product_id ?></td>
                        <td><?= $product->product_name ?></td>    
                        <td><?= $product->product_id_category ?></td>    
                        <td><?= $product->product_id_brand ?></td>    
                        <td>
                            <?php ($product->product_featured == 1) ? $featuread = "checked='checked'" : $featuread = ''; ?>
                            <input type="checkbox" <?= $featuread?> name="product_featured">
                        </td>    
                        <td>
                            <?php ($product->product_sale == 1) ? $sale = "checked='checked'" : $sale = ''; ?>
                            <input type="checkbox" <?= $sale?> name="sale" name="product_sale">
                        </td>    
                        <td>
                            <?php ($product->product_offer == 1) ? $offer = "checked='checked'" : $offer = ''; ?>
                            <input type="checkbox" <?= $offer?> name="offer">
                        </td>    
                        
                        <td><?= $product->product_status == 1 ? 'Ativo' : 'Bloqueado'?></td>
                        <td>
                            <a href="<?= HOME; ?>/products/index&del=<?= $product->product_id; ?>" onclick="return confirm('Deseja realmente excluir o produto <?= $product->product_name ?>');" title="Excluir" class="btn-delete"></a>
                            <a href="<?= HOME; ?>/products/update&id=<?= $product->product_id?>" title="Atualizar" class="btn-update"></a>
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
            $total = $productControler->countProduct();            
            
            
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
