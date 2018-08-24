<?php
$helper = new Helper();
$upload = new Upload();
$categoryController = new CategoryController();
$brandController = new BrandController();
$productControler = new ProductController();

$category_selected = '';
$fabricante = '';
$resultado = '';
$result = '';

$btnCadastrar = filter_input(INPUT_POST, 'btn_cadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar):

    //upload da imagem
    $imagem = $_FILES['imagemArtigo'];
    $titleThumb = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
    $upload->Image($imagem, $titleThumb, 1000, 'products');
    $nomeImagem = $upload->getResult();

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
        'product_thumb' => $nomeImagem
    );
    
    if ($upload->getResult()):
        if ($productControler->Cadastrar($dados)):
            $resultado = '<div class="trigger trigger-accept">
            <button type="button" aria-hidden="true" class="close"></button>
            <span><b> "Sucesso - </b> Produto cadastrado!"</span>
        </div>';
            $insertGoTo = 'create';
            header("refresh:2;url={$insertGoTo}");
        else:
            $resultado = ' <div class="trigger trigger-error">
            <button type="button" aria-hidden="true" class="close"></button>
            <span><b> "Erro - </b> Os campos que possuem * são obrigatórios!"</span>
        </div>';
        endif;
    else:
        $result = ' <div class="trigger trigger-infor">
            <button type="button" aria-hidden="true" class="close"></button>
            <span><b> "Erro - </b> Não foi possivel cadastrar imagem tamanho ou formato é inválido!"</span>
        </div>';
    endif;
endif;

//listando os fabricantes
$listBrands = $brandController->listBrands();
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
                        <div class="form-field">
                            <label>*CAPA (JPG 800X1000PX):</label>
                            <input type="file" class="form-field uploader" id="imagemArtigo"  name="imagemArtigo">
                        </div>                              

                        <div class="row">
                            <div class="column column-8">
                                <div class="form-field">
                                    <label>*Produto</label>
                                    <input type="text" class="form-field" id="product_name" name="product_name" placeholder="nome do produto" value="<?php if (isset($titulo)) echo $titulo; ?>">
                                    <span class="msg-error msg-titulo"></span>
                                </div>                         
                            </div>

                            <div class="column column-4">
                                <div class="form-field">
                                    <label>SKU</label>
                                    <input type="text" class="form-field" name="product_ra" placeholder="Código do Produto" value="<?php if (isset($ra)) echo $ra; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row form-field">
                            <div class="column column-4">                                        
                                <label>*Categoria:</label>
                                <select id="slStatus" name="slCategory" class="form-select">
                                    <option value=""> Selecione a categoria: </option>
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
                                                    if ($category_selected == $sub->category_id):
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
                                    <option value="">Selecione o Fabricante</option>
                                    <?php
                                    if ($listBrands != null):
                                        foreach ($listBrands as $brand):
                                            echo "<option ";
                                            if ($fabricante == $brand->brand_id):
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
                                    <option value="">Selecione o Status</option>
                                    <option value="1">Ativo</option>
                                    <option value="2">Bloqueado</option>
                                </select>
                                <span class="msg-error msg-status"></span>                                        
                            </div>
                        </div>

                        <div class="form-field">
                            <label>Descrição do Produto</label>
                            <textarea rows="5" name="txtDescricao" class="tinymce" placeholder="Descrição do produto" value="">
                            </textarea>
                        </div>

                        <div class="row form-field">
                            <div class="column column-5">
                                <div class="form-group">
                                    <label>*De preço</label>
                                    <input type="text" class="form-field" id="txtPrice" name="txtPrice" placeholder="1000,00" value="<?php if (isset($price)) echo $price; ?>">
                                    <span class="msg-error msg-preco"></span>
                                </div>
                            </div>
                            <div class="column column-5">
                                <div class="form-group">
                                    <label>Por preço</label>
                                    <input type="text" class="form-field" id="txtPrice" name="txtPriceFrom" placeholder="1000,00" value="<?php if (isset($price_from)) echo $price_from; ?>">
                                    <span class="msg-error msg-preco"></span>
                                </div>
                            </div>
                            <div class="column column-2">
                                <div class="form-group">
                                    <label>Estoque</label>
                                    <input type="number" min="0" class="form-field" name="txtStock" placeholder="1" value="<?php if (isset($stock)) echo $stock; ?>">
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
                    <div class="card card-user">
                        <div class="image">
                            <img id="img-uploaded" src="<?= INCLUDE_PATH; ?>/images/no_image.jpg" alt="Sua imagem" width="100%">
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
                                <label><input type="checkbox" name="featured" value="1">Destaque</label>
                            </div>
                        </div>
                        <div class="column column-6">
                            <div class="form-check">
                                <label><input type="checkbox" name="sale" value="1"> Venda</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">    

                        <div class="column column-6">
                            <div class="form-check">
                                <label><input type="checkbox" name="bestseller" value="1"> Melhor Produto</label>
                            </div>
                        </div>
                        <div class="column column-6">
                            <div class="form-check">
                                <label><input type="checkbox" name="new" value="1"> Novo Produto</label>
                            </div>
                        </div>
                    </div>                   
                    <div class="row"> 
                        <div class="column column-6">
                            <div class="form-check">
                                <label><input type="checkbox" name="ofter" value="1"> Promoção</label>
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