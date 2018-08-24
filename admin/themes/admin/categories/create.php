<?php
//instanciando as classes
$helper = new Helper();
$upload = new Upload();
$categoryController = new CategoryController();

$resultado = "";

//chamando o botão enviar
$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    
    //upload da imagem
    $imagem = $_FILES['imagemArtigo'];
    $titleThumb = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
    $upload->Image($imagem, $titleThumb, 1000, 'categories');
    $nomeImagem = $upload->getResult();
    
    $dados = array(        
        'category_name' => filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING),
        'category_url' => $helper->Name(filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING)),
        'category_status' => filter_input(INPUT_POST, 'category_status', FILTER_SANITIZE_NUMBER_INT),        
        //SETANDO OS VALORES 
        'category_parent' => (filter_input(INPUT_POST, 'category_parent', FILTER_SANITIZE_NUMBER_INT)) ? filter_input(INPUT_POST, 'category_parent', FILTER_SANITIZE_NUMBER_INT) : NULL,
        'category_thumb' => $nomeImagem
    );  

    if ($categoryController->Cadastrar($dados)):
        $resultado = '<div class="trigger trigger-accept">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Categoria cadastrado!</p>
                      </div>';
        $insertGoTo = HOME."/categories/create";
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = '<div class="trigger trigger-error">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha os campos que possuem *!</p>
                      </div>';
    endif;
endif;
$listaCategories = $categoryController->parentList();
?>
<div class="post-conteudo container">
    <div class="cad-form">
        <h1>Nova Categoria</h1>
        <form method="post" class="fl-left box-full" enctype="multipart/form-data">
            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">*Capa:</span>
                         <input type="file" id="imagemArtigo"  name="imagemArtigo">
                    </label>
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">*Titulo:</span>
                        <input value="" type="text" name="category_name" placeholder="Titulo da Categoria:"  />
                    </label>
                </div>
                <div class="column column-2">
                    <label>
                        <span class="form-field">Categorias:</span>
                        <select class="form-select" name="category_parent">
                            <option value="null"> Selecione a Seção: </option>
                            <?php                            
                            if ($listaCategories == null):
                                echo '<option disabled="disabled" value="null"> Cadastre antes uma seção! </option>';
                            else:
                                foreach ($listaCategories as $cat):
                                   echo "<option value=\"{$cat->category_id}\" ";
                                   echo "> {$cat->category_name} </option>";
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </label>
                </div>
                <div class="column column-2">
                    <label>
                        <span class="form-field">*Status:</span>
                        <select class="form-select" name="category_status">
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


