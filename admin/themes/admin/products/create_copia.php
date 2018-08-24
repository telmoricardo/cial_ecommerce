<?php
$product = new Products();
$helper = new Helper();
$categoryController = new CategoryController();
$brandController = new BrandController();
$productControler = new ProductController();


//$teste = array(            
//            "name" => "teste1"
//        );
//$productDAO = new ProductDAO();
//$productDAO->Cadastrar($teste);
//
//
//if($product::getResult()):
//    echo 'o ultimo id inserido';
//endif;
        
$btnCadastrar = filter_input(INPUT_POST, 'btn_cadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar):
//
    $Dados = array(
        "name" => $product->setName(filter_input(INPUT_POST, 'txtProduto', FILTER_SANITIZE_STRING)),
    );

    $productControler->Cadastrar($Dados);
    
//    $productDAO = new ProductDAO();
//    $productDAO->Cadastrar($Dados);
//
//    $slug = $helper->Name($product->getProduct_name());
//    $product->setProduct_url($slug);
//    $product->setProduct_ra(filter_input(INPUT_POST, 'txtCodigo', FILTER_SANITIZE_STRING));
//    $product->setProduct_id_category(filter_input(INPUT_POST, 'slCategory', FILTER_SANITIZE_NUMBER_INT));
//    $product->setProduct_status(filter_input(INPUT_POST, 'slStatus', FILTER_SANITIZE_NUMBER_INT));
//    $product->setProduct_description(filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_MAGIC_QUOTES));
//    $product->setProduct_id_brand(filter_input(INPUT_POST, 'slFabricante', FILTER_SANITIZE_NUMBER_INT));
//    $product->setProduct_price(filter_input(INPUT_POST, 'txtPrice', FILTER_SANITIZE_STRING));
//    $product->setProduct_price_from(filter_input(INPUT_POST, 'txtPriceFrom', FILTER_SANITIZE_STRING));
//    $product->setProduct_price_from(filter_input(INPUT_POST, 'txtPriceFrom', FILTER_SANITIZE_STRING));
//    $product->setProduct_stock(filter_input(INPUT_POST, 'txtStock', FILTER_SANITIZE_NUMBER_INT));    
//    
//    //SETANDO OS VALORES SE NÃO ESTIVER SELECIONADO RECEBER O VALOR => 2
//    (filter_input(INPUT_POST, 'featured', FILTER_SANITIZE_NUMBER_INT)) ? $product->setProduct_featured(filter_input(INPUT_POST, 'featured', FILTER_SANITIZE_NUMBER_INT)) : $product->setProduct_featured(2);
//    (filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_NUMBER_INT)) ? $product->setProduct_sale(filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_NUMBER_INT)) : $product->setProduct_sale(2);
//    (filter_input(INPUT_POST, 'bestseller', FILTER_SANITIZE_NUMBER_INT)) ? $product->setProduct_bestseller(filter_input(INPUT_POST, 'bestseller', FILTER_SANITIZE_NUMBER_INT)) : $product->setProduct_bestseller(2);
//    (filter_input(INPUT_POST, 'new', FILTER_SANITIZE_NUMBER_INT)) ? $product->setProduct_new(filter_input(INPUT_POST, 'new', FILTER_SANITIZE_NUMBER_INT)) : $product->setProduct_new(2);
//    (filter_input(INPUT_POST, 'ofter', FILTER_SANITIZE_NUMBER_INT)) ? $product->setProduct_offer(filter_input(INPUT_POST, 'ofter', FILTER_SANITIZE_NUMBER_INT)) : $product->setProduct_offer(2);
//    
//    
//    $titulo = $product->getProduct_name();
//    $ra = $product->getProduct_ra();
//    $category_selected = $product->getProduct_id_category();
//    $fabricante = $product->getProduct_id_brand();
//    $price = $product->getProduct_price();
//    $price_from = $product->getProduct_price_from();
//    $stock = $product->getProduct_stock();
//    echo '<pre>';
//    print_r($product);
//    echo '</pre>';
endif;

//listando as categorias
$listCategory = $categoryController->parentList();
//listando os fabricantes
$listBrands = $brandController->listBrand();

?>
<div class="container">
    <div class="content">
        <div class="row">
            <form method="post" enctype="multipart/form-data" id="frmProduto" name="frmProduto" onSubmit="return validaCadastro();">
                <h1 style="margin: 15px 0; float: left; width: 100%;" class="title">Cadastrar Novo Produto</h1>  
                <div class="column column-8">
                    <form>
                        <div class="form-field">
                            <label>*CAPA (JPG 800X1000PX):</label>
                            <input type="file" class="form-field uploader" id="imagemArtigo"  name="imagemArtigo">
                        </div>                              

                        <div class="row">
                            <div class="column column-8">
                                <div class="form-field">
                                    <label>*Produto</label>
                                    <input type="text" class="form-field" id="txtProduto" name="txtProduto" placeholder="nome do produto" value="<?php if (isset($titulo)) echo $titulo; ?>">
                                    <span class="msg-error msg-titulo"></span>
                                </div>                         
                            </div>

                            <div class="column column-4">
                                <div class="form-field">
                                    <label>SKU</label>
                                    <input type="text" class="form-field" name="txtCodigo" placeholder="Código do Produto" value="<?php if (isset($ra)) echo $ra; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row form-field">
                            <div class="column column-4">                                        
                                <label>*Categoria:</label>
                                <select id="slStatus" name="slCategory" class="form-select">
                                    <option value=""> Selecione a categoria: </option>
                                    <?php
                                    if ($listCategory != null):
                                        foreach ($listCategory as $catPai):
                                            echo "<option disabled=\"disabled\" value=\"\"> {$catPai->getCategory_name()} </option>";
                                            $listaSubcategory = $categoryController->RetornaSubcategory($catPai->getCategory_id());

                                            if ($listaSubcategory != null):
                                                foreach ($listaSubcategory as $cat):
                                                    echo "<option ";

                                                    if ($category_selected == $cat->getCategory_id()):
                                                        echo "selected=\"selected\" ";
                                                    endif;

                                                    echo "value=\"{$cat->getCategory_id()}\"> &raquo;&raquo; {$cat->getCategory_name()} </option>";
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

                                            if ($fabricante == $brand->getBrand_id()):
                                                echo "selected=\"selected\" ";
                                            endif;

                                            echo "value=\"{$brand->getBrand_id()}\"> &raquo; {$brand->getBrand_name()} </option>";
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
                            <textarea rows="5" name="txtDescricao" class="form-field" placeholder="Descrição do produto" value="">
                            </textarea>
                        </div>

                        <div class="row form-field">
                            <div class="column column-5">
                                <div class="form-group">
                                    <label>De preço</label>
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

                    <div class="form-field">
                        <h4 class="title">DIMENSÕES DO PRODUTO:</h4>
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