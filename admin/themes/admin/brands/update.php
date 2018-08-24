<?php
//instanciando as classes
$helper = new Helper();
$upload = new Upload();
$brandController = new BrandController();

$resultado = "";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

//chamando o botão enviar
$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    
    $dados = array(
        'brand_name' => filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING),
        'brand_url' => $helper->Name(filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING)),
        'brand_status' => filter_input(INPUT_POST, 'brand_status', FILTER_SANITIZE_NUMBER_INT)
    );  

    if ($brandController->Atualizar($dados, "brand_id", $id)):
        $resultado = '<div class="trigger trigger-accept">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Fabricante atualizado!</p>
                      </div>';
//        $insertGoTo = HOME."/brands/update&id={$id}";
        $insertGoTo = HOME."/brands/index";
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = '<div class="trigger trigger-error">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha os campos que possuem *!</p>
                      </div>';

    endif;
endif;

$returnBrand = $brandController->findProduct("brand_id", $id);

if($returnBrand == null):   
else:
    $name = $returnBrand->brand_name;
    $statusBrand = $returnBrand->brand_status;

?>
<div class="post-conteudo container">
    <div class="cad-form">
        <h1>Nova Marca</h1>
        <form method="post" class="fl-left box-full" enctype="multipart/form-data">
            <div class="row">
                <div class="column column-8">
                    <label>
                        <span class="form-field">*Titulo:</span>
                        <input value="<?= $name ?>" type="text" name="brand_name" placeholder="Titulo da Marca:"  />
                    </label>
                </div>
                
                <div class="column column-4">
                    <label>
                        <span class="form-field">*Status:</span>
                        <select class="form-select" name="brand_status">
                            <?php
                                $status = array('1' => 'Ativo', '2' => 'Bloqueado');                                                    
                                foreach ($status as $key => $value):                                                      
                                    $esseEhOStatus = $statusBrand == $key;
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
                    <input type="submit" class="btn btn-green" name="btnEnviar" value="Enviar">
                </div>
            </div>
        </form>
    </div>
    <div class="clear"></div>
</div>
<?php
endif;

