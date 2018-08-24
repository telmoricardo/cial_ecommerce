<?php
$helper = new Helper();
$upload = new Upload();
$categoryController = new CategoryController();
$brandController = new BrandController();
$productControler = new ProductController();

//retorno o valor atraves da url id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//setando com os valores vazio
$category_selected = '';
$fabricante = '';
$resultado = '';
$result = '';

if (filter_input(INPUT_POST, "btnAlterarImg", FILTER_SANITIZE_STRING)): 
    
    $codImg = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);   
    $returnThumb = $productControler->findProduct("product_id", $codImg);
    
    //pegando a capa e nome do produto
    $capa = $returnThumb->product_thumb;
    $titleProduct = $returnThumb->product_name;
    
    if($returnThumb):
        $capa = "../upload/" . $returnThumb->product_thumb;
        if (file_exists($capa) && !is_dir($capa)):
            unlink($capa);
        endif;
        //upload da imagem
        $imagem = $_FILES['imagemArtigo'];        
        $upload->Image($imagem, $titleProduct, 1000, 'products');
        $nomeImagem = $upload->getResult();
        
        $dados_image = array(
            'product_thumb' => $nomeImagem
        ); 
        
        if ($upload->getResult()):
            if ($productControler->Atualizar($dados_image, "product_id", $codImg)):
                $resultado = "<div class=\"trigger trigger-accept\">A imagem <b>{$nomeImagem} </b> foi alterado com sucesso</div>";
            else:
                $resultado = "<div class=\"trigger trigger-accept\">Erro ao cadastrar </div>";
            endif;
        else:
            $result = ' <div class="trigger trigger-error">
                <button type="button" aria-hidden="true" class="close"></button>
                <span><b> "Erro - </b> Não foi possivel cadastrar imagem tamanho ou formato é inválido!"</span>
            </div>';
        endif;
    endif;
endif;

$btnCadastrar = filter_input(INPUT_POST, 'btn_cadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar):
    $dados = array(
        'product_id_category' => filter_input(INPUT_POST, 'slCategory', FILTER_SANITIZE_NUMBER_INT),
        'product_id_brand' => filter_input(INPUT_POST, 'slFabricante', FILTER_SANITIZE_NUMBER_INT),
        'product_name' => filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING),
        'product_ra' => filter_input(INPUT_POST, 'product_ra', FILTER_SANITIZE_STRING),
        'product_url' => $helper->Name(filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING)),
        'product_status' => filter_input(INPUT_POST, 'slStatus', FILTER_SANITIZE_NUMBER_INT),
        'product_description' => filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_MAGIC_QUOTES),
        'product_price' => filter_input(INPUT_POST, 'txtPrice', FILTER_SANITIZE_STRING),
        'product_price_from' => filter_input(INPUT_POST, 'txtPriceFrom', FILTER_SANITIZE_STRING),
        'product_stock' => filter_input(INPUT_POST, 'txtStock', FILTER_SANITIZE_NUMBER_INT),
        'product_rating' => (1),
        //SETANDO OS VALORES SE NÃO ESTIVER SELECIONADO RECEBER O VALOR => 2
        'product_featured' => (filter_input(INPUT_POST, 'featured', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'featured', FILTER_SANITIZE_NUMBER_INT) : (2),
        'product_sale' => (filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_NUMBER_INT) : (2),
        'product_bestseller' => (filter_input(INPUT_POST, 'bestseller', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'bestseller', FILTER_SANITIZE_NUMBER_INT) : (2),
        'product_new' => (filter_input(INPUT_POST, 'new', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'new', FILTER_SANITIZE_NUMBER_INT) : (2),
        'product_offer' => (filter_input(INPUT_POST, 'ofter', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'ofter', FILTER_SANITIZE_NUMBER_INT) : (2),
    );    
    
    if ($productControler->Atualizar($dados, "product_id", $id)):
        $resultado = '<div class="trigger trigger-accept">
            <button type="button" aria-hidden="true" class="close"></button>
            <span><b> "Sucesso - </b> Produto atualizado!"</span>
        </div>';
        $insertGoTo = 'index';
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = ' <div class="trigger trigger-error">
            <button type="button" aria-hidden="true" class="close"></button>
            <span><b> "Erro - </b> Os campos que possuem * são obrigatórios!"</span>
        </div>';
    endif;

endif;

//listando as categorias
$listCategory = $categoryController->parentList();
//listando os fabricantes
$listBrands = $brandController->listBrands();

//retornando os dados com id
$findIdProduct = $productControler->findProduct("product_id", $id);

if ($findIdProduct == null):
    echo '<div class="container" style="margin-top: 20px; text-align: center;">'
    . '<div class="content"><div class="trigger trigger-infor">Não existe produto cadastrado</div></div></div>';    
    $insertGoTo = HOME . "/products/index";
    header("refresh:2;url={$insertGoTo}");
else:
    $titleProduct = $findIdProduct->product_name;
    $thumbProduct = $findIdProduct->product_thumb;
    $skuProduct = $findIdProduct->product_ra;
    $catProduct = $findIdProduct->product_id_category;
    $branProduct = $findIdProduct->product_id_brand;
    $textProduct = $findIdProduct->product_description;
    $priceProduct = $findIdProduct->product_price;
    $priceFromProduct = $findIdProduct->product_price_from;
    $stockProduct = $findIdProduct->product_stock;    
    $statusProduct = $findIdProduct->product_status; 
    $featuredProduct = $findIdProduct->product_featured; 
    $saleProduct = $findIdProduct->product_sale; 
    $bestsellerProduct = $findIdProduct->product_bestseller; 
    $newProduct = $findIdProduct->product_new; 
    $offerProduct = $findIdProduct->product_offer;
?>

<div class="container">
    <div class="content">
        <div class="row">
            <form method="post" enctype="multipart/form-data" id="frmProduto" name="frmProduto" onSubmit="return validaCadastro();">
                <h1 style="margin: 15px 0; float: left; width: 100%;" class="title">Cadastrar Novo Produto</h1>  
                <div class="column column-8">
                    <form>
                        <div class="form-field">
                            <?= $result; ?>
                            <?= $resultado; ?>
                        </div>                          
                                                     
                        <div class="row">
                            <div class="column column-8">
                                <div class="form-field">
                                    <label>*Produto</label>
                                    <input type="text" class="form-field" id="product_name" name="product_name" placeholder="nome do produto" value="<?= $titleProduct; ?>">
                                    <span class="msg-error msg-titulo"></span>
                                </div>                         
                            </div>

                            <div class="column column-4">
                                <div class="form-field">
                                    <label>SKU</label>
                                    <input type="text" class="form-field" name="product_ra" placeholder="Código do Produto" value="<?= $skuProduct; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row form-field">
                            <div class="column column-4">                                        
                                <label>*Categoria:</label>
                                <select id="slStatus" name="slCategory" class="form-select">                                    
                                    <?php
                                    $listCategory = $categoryController->parentList();                                    
                                    if ($listCategory != null):
                                        foreach ($listCategory as $catPai):                                            
                                            echo "<option disabled=\"disabled\" value=\"\"> {$catPai->category_name} </option>";
                                            $arrayParams = array($catPai->category_id);
                                            $listasub = $categoryController->returnCategory($arrayParams, true);
                                            if ($listasub != null):
                                                foreach ($listasub as $sub):
                                                    echo "<option ";
                                                    if ($catProduct == $sub->category_id):
                                                        echo "selected=\"selected\" ";
                                                    endif;
                                                    echo "value=\"{$sub->category_id}\"> &raquo;&raquo;{$sub->category_name} </option>";
                                                endforeach;
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>

                                </select>
                                <span class="msg-error msg-status"></span>                                        
                            </div>
                            <div class="column column-4">                                        
                                <label>*Fabricante</label>
                                <select id="slStatus" name="slFabricante" class="form-select">                                                   
                                    <?php
                                    if ($listBrands != null):
                                        foreach ($listBrands as $brand):
                                            echo "<option ";
                                            if ($branProduct == $brand->brand_id):
                                                echo "selected=\"selected\" ";
                                            endif;
                                            echo "value=\"{$brand->brand_id}\"> &raquo; {$brand->brand_name} </option>";
                                        endforeach;
                                    endif;
                                    ?>                                 

                                </select>
                                <span class="msg-error msg-status"></span>                                        
                            </div>
                            <div class="column column-4">                                        
                                <label>*Status</label>
                                <select id="slStatus" name="slStatus" class="form-select">                                                    
                                    <?php
                                        $status = array('1' => 'Ativo', '2' => 'Bloqueado');                                                    
                                        foreach ($status as $key => $value):                                                      
                                            $esseEhOStatus = $statusProduct == $key;
                                            $selecao = $esseEhOStatus ? "selected='selected'" : ''; 
                                    ?>
                                        <option value="<?= $key; ?>" <?= $selecao?>><?= $value ?></option>
                                    <?php
                                       endforeach;
                                    ?>
                                </select>
                                <span class="msg-error msg-status"></span>                                        
                            </div>
                        </div>

                        <div class="form-field">
                            <label>Descrição do Produto</label>
                            <textarea rows="10" name="txtDescricao" class="tinymce" placeholder="Descrição do produto">
                            <?= $textProduct; ?>
                            </textarea>
                        </div>

                        <div class="row form-field">
                            <div class="column column-5">
                                <div class="form-group">
                                    <label>*De preço</label>
                                    <input type="text" class="form-field" id="txtPrice" name="txtPrice" placeholder="1000,00" value="<?= number_format($priceProduct, 2, ",", "."); ?>">
                                    <span class="msg-error msg-preco"></span>
                                </div>
                            </div>
                            <div class="column column-5">
                                <div class="form-group">
                                    <label>Por preço</label>
                                    <input type="text" class="form-field" id="txtPrice" name="txtPriceFrom" placeholder="1000,00" value="<?= number_format($priceFromProduct, 2, ",", "."); ?>">
                                    <span class="msg-error msg-preco"></span>
                                </div>
                            </div>
                            <div class="column column-2">
                                <div class="form-group">
                                    <label>Estoque</label>
                                    <input type="number" min="0" class="form-field" name="txtStock" placeholder="1" value="<?= $stockProduct; ?>">
                                </div>
                            </div>                           
                        </div>

                        <div class="row form-field">
                            <div class="column column-4">
                                <input class="btn btn-green" type="submit" name="btn_cadastrar" value="Cadastrar">
                            </div>
                        </div>

                </div>

                <div class="column column-4">
                    <div>
                        <div class="row" id="image_preview">                               
                        </div>
                        <div class="image">
                            <?php                            
                                if($thumbProduct== ''):
                                    echo '<img id="img-uploaded" width="100%" src="'.INCLUDE_PATH.'/images/no_image.jpg" alt="Sua imagem">';
                                else:
                                ?>
                                <img width="100%" id='img-uploaded' src="./../../upload/<?= $thumbProduct?>" alt='Sua imagem'>
                                <?php
                                endif;
                            ?>   
                        </div>                       
                    </div> 
                    
                    <div style="background-color: #ddd; float: left; margin: 1.5rem 0; padding: 8px;">
                        <div id="image_preview">                               
                        </div>
                        
                        <div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>CAPA (JPG 800X1000PX):</label>
                                        <input type="file" class="form-field uploader" id="imagemArtigo"  name="imagemArtigo">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-blue" name='btnAlterarImg' value="Alterar Capa"/>
                                </div>
                            </form>                              

                        </div>
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <h4 class="title" >DIMENSÕES DO PRODUTO:</h4>
                        <p style="margin: 10px 0;" class="trigger trigger-accept">*Largura e Altura em cm <br> *Peso em grama</p>
                    </div>

                    <div class="row form-field">                                    
                        <div class="column column-4">
                            <label>ALTURA:</label>
                            <input type="number" step="0.01" class="form-field" id="txtAltura" name="txtAltura" placeholder="11,9" value="">
                            <span class="msg-error msg-altura"></span>
                        </div>

                        <div class="column column-4">
                            <label>LARGURA:</label>
                            <input type="number" step="0.01" class="form-field" id="txtLargura" name="txtLargura" placeholder="11,9" value="">
                            <span class="msg-error msg-largura"></span>
                        </div>

                        <div class="column column-4">
                            <label>PESO:</label>
                            <input type="number" step="0.01" class="form-field" id="txtPeso" name="txtPeso" placeholder="0,200" value="">
                            <span class="msg-error msg-peso"></span>
                        </div>
                    </div>

                    <div class="row">    
                        <span class="form-field">Mais Informações do Produto:</span>
                        <div class="column column-6">
                            <div class="form-check">
                                <?php ($featuredProduct == 1) ? $featuread = "checked='checked'" : $featuread = ''; ?>
                                <label><input type="checkbox" <?= $featuread?> name="featured" value="1">Destaque</label>
                            </div>
                        </div>
                        <div class="column column-6">
                            <div class="form-check">
                                <?php ($saleProduct == 1) ? $sale = "checked='checked'" : $sale = ''; ?>
                                <label><input type="checkbox" <?= $sale ?> name="sale" value="1"> Venda</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">    

                        <div class="column column-6">
                            <div class="form-check">
                                <?php ($bestsellerProduct == 1) ? $bestseller = "checked='checked'" : $bestseller = ''; ?>
                                <label><input type="checkbox" <?= $bestseller ?> name="bestseller" value="1"> Melhor Produto</label>
                            </div>
                        </div>
                        <div class="column column-6">
                            <div class="form-check">
                                <?php ($newProduct == 1) ? $new = "checked='checked'" : $new = ''; ?>
                                <label><input type="checkbox" <?= $new ?> name="new" value="1"> Novo Produto</label>
                            </div>
                        </div>
                    </div>                   
                    <div class="row"> 
                        <div class="column column-6">
                            <div class="form-check">
                                <?php ($offerProduct == 1) ? $offer = "checked='checked'" : $offer = ''; ?>
                                <label><input type="checkbox" <?= $offer ?>  name="ofter" value="1"> Promoção</label>
                            </div>
                        </div>

                    </div>                   

                </div>
        </div>
        </form>
    </div>
</div>
<div class="clear"></div>
</div>
<?php
endif;