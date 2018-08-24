<?php
//instanciando as classes
$helper = new Helper();
$upload = new Upload();
$brandController = new BrandController();

$resultado = "";

//chamando o botão enviar
$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    
    $dados = array(
        'brand_name' => filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING),
        'brand_url' => $helper->Name(filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING)),
        'brand_status' => filter_input(INPUT_POST, 'brand_status', FILTER_SANITIZE_NUMBER_INT)
    );  

    if ($brandController->Cadastrar($dados)):
        $resultado = '<div class="trigger trigger-accept">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Fabricante cadastrado!</p>
                      </div>';
        $insertGoTo = HOME."/brands/create";
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = '<div class="trigger trigger-error">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha os campos que possuem *!</p>
                      </div>';

    endif;
endif;
?>
<div class="post-conteudo container">
    <div class="cad-form">
        <h1>Nova Marca</h1>
        <form method="post" class="fl-left box-full" enctype="multipart/form-data">
            <div class="row">
                <div class="column column-8">
                    <label>
                        <span class="form-field">*Titulo:</span>
                        <input value="" type="text" name="brand_name" placeholder="Titulo da Marca:"  />
                    </label>
                </div>
                
                <div class="column column-4">
                    <label>
                        <span class="form-field">*Status:</span>
                        <select class="form-select" name="brand_status">
                            <option selected disabled value="">Selecione o status:</option>
                            <option value="1">Ativo</option>
                            <option value="2">Bloqueado</option>
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


