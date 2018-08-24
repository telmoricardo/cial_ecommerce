<?php
//instanciando as classes
$category = new Categories();
$helper = new Helper();
$categoryController = new CategoryController();

$resultado = "";

//pegando cod pela url
$category_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//chamando o botão enviar
$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    
    $dados = array(        
        'category_name' => filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING),
        'category_url' => $helper->Name(filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING)),
        'category_status' => filter_input(INPUT_POST, 'category_status', FILTER_SANITIZE_NUMBER_INT),        
        //SETANDO OS VALORES 
        'category_parent' => (filter_input(INPUT_POST, 'category_parent', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'category_parent', FILTER_SANITIZE_NUMBER_INT) : NULL
    );  


    if ($categoryController->Atualizar($dados, "category_id", $category_id)):
        $resultado = '<div class="trigger trigger-accept">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Categoria atualizado!</p>
                      </div>';
        $insertGoTo = HOME."/categories/index";
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = '<div class="trigger trigger-error">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha os campos que possuem *!</p>
                      </div>';
    endif;
endif;

$returnCategory = $categoryController->fieldCategory("category_id", $category_id);
if($returnCategory == null):
else:    
    $idCat      = $returnCategory->category_id;  
    $name       = $returnCategory->category_name;  
    $statusCat  = $returnCategory->category_status;
    $parent     = $returnCategory->category_parent;

?>
<div class="post-conteudo container">
    <div class="cad-form">
        <h1>Nova Categoria</h1>
        <form method="post" class="fl-left box-full" >
            <div class="row">
                <div class="column column-6">
                    <label>
                        <span class="form-field">*Titulo:</span>
                        <input value="<?= $name; ?>" type="text" name="category_name" placeholder="Titulo da Categoria:"  />
                    </label>
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Categorias:</span>
                        <select class="form-select" name="category_parent">
                            <option value="null"> Selecione a Seção: </option>
                            <?php
                            $listaCategories = $categoryController->parentList();
                            if ($listaCategories == null):
                                echo '<option disabled="disabled" value="null"> Cadastre antes uma seção! </option>';
                            else:
                                foreach ($listaCategories as $cat):
                                   echo "<option value=\"{$cat->category_id}\" ";
                                   
                                   if ($cat->category_id == $parent):
                                        echo ' selected="selected" ';
                                    endif;
                                    
                                   echo "> {$cat->category_name} </option>";
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </label>
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">*Status:</span>
                        <select class="form-select" name="category_status">
                            <?php
                                $status = array('1' => 'Ativo', '2' => 'Bloqueado');                                                    
                                foreach ($status as $key => $value):                                                      
                                    $esseEhOStatus = $statusCat == $key;
                                    $selecao = $esseEhOStatus ? "selected='selected'" : ''; 
                            ?>
                                <option value="<?= $key; ?>" <?= $selecao?>><?= $value ?></option>
                            <?php
                               endforeach;
                            ?>
                        </select>
                    </label>
                </div>

            </div>
            
            <div class="row">
                <div class="column column-12">
                    <?= $resultado; ?>
                </div>
            </div>            

            <div class="row">
                <div class="column column-2">
                    <input type="submit" class="btn btn-blue" name="btnEnviar" value="Atualizar">
                </div>
            </div>
        </form>
    </div>
    <div class="clear"></div>
</div>
<?php
endif;
?>

