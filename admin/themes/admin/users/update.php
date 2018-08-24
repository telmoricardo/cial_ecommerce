<?php
$usuario = new User();
$userController = new UserController();

$idUser = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

$resultado = "";

$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if($btnEnviar):
    $usuario->setUser_name(filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING));
    $usuario->setUser_lastname(filter_input(INPUT_POST, 'user_lastname', FILTER_SANITIZE_STRING));
    $usuario->setUser_document(filter_input(INPUT_POST, 'user_document', FILTER_SANITIZE_STRING));
    $usuario->setUser_telephone(filter_input(INPUT_POST, 'user_telephone', FILTER_SANITIZE_STRING));
    $usuario->setUser_cell(filter_input(INPUT_POST, 'user_cell', FILTER_SANITIZE_STRING));
    $usuario->setUser_email(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING));
    $senha = password_hash(filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING), CRYPT_BLOWFISH, ['cost' => 12]);
    $usuario->setUser_password($senha);
    $usuario->setUser_level(filter_input(INPUT_POST, 'user_level', FILTER_SANITIZE_STRING));
    $usuario->setUser_genre(filter_input(INPUT_POST, 'user_genre', FILTER_SANITIZE_NUMBER_INT));
    $usuario->setUser_status(filter_input(INPUT_POST, 'user_status', FILTER_SANITIZE_NUMBER_INT));
    $lastupdate = date("Y-m-d H:i:s");
    $usuario->setUser_lastupdate($lastupdate);
    $usuario->setUser_id($idUser);    
    
    if($userController->Atualizar($usuario)):
        $resultado = '<div class="trigger trigger-infor">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Usuário atualizado!</p>
                      </div>';
        $insertGoTo = HOME."/users/index";
        header("refresh:2;url={$insertGoTo}");
    else:
        $resultado = '<div class="trigger trigger-error">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha os campos que possuem *!</p>
                      </div>';    
    endif;
endif;

//RETORNANDO OS DADOS
$returnUser = $userController->returnUser($idUser);
if($returnUser != null):
    $name = $returnUser->getUser_name();
    $lastname = $returnUser->getUser_lastname();
    $document = $returnUser->getUser_document();
    $phone = $returnUser->getUser_telephone();
    $cell = $returnUser->getUser_cell();
    $email = $returnUser->getUser_email();
    $level = $returnUser->getUser_level();
    $genre = $returnUser->getUser_genre();
    $statusU = $returnUser->getUser_status();

?>
<div class="post-conteudo container">                   
    <div class="cad-form">
        <h1>Atualizar Usuário</h1>
        <form method="post" class="fl-left box-full" >
            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">Primeiro Nome:</span>
                        <input value="<?= $name; ?>" type="text" name="user_name" placeholder="Primeiro Nome:"  />
                    </label>                       
                </div>
                <div class="column column-6">
                    <label>
                        <span class="form-field">Sobrenome:</span>
                        <input value="<?= $lastname; ?>" type="text" name="user_lastname" placeholder="Sobrenome:"  />
                    </label>                       
                </div>
                <div class="column column-2">
                    <label>
                        <span class="form-field">CPF:</span>
                        <input value="<?= $document; ?>" type="text" name="user_document" class="formCpf" placeholder="CPF:"  />
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">Telefone:</span>
                        <input value="<?= $phone; ?>" class="formPhone" type="text" name="user_telephone" placeholder="(55) 5555.5555" />
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">Celular:</span>
                        <input value="<?= $cell; ?>" class="formPhone" type="text" name="user_cell" placeholder="(55) 55555.5555" />
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">E-mail:</span>
                        <input value="<?= $email; ?>" type="email" name="user_email" placeholder="E-mail:"  />
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-3">
                    <label>
                        <span class="form-field">Senha: (Entre 5 e 11 caracteres):</span>
                        <input value="" type="password" name="user_password" placeholder="****************"/>
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Nível de acesso:</span>
                        <select class="form-select" name="user_level">
                            <?php
                            $NivelDeAcesso = getLevel();
                            foreach ($NivelDeAcesso as $key => $value):
                                $esseEhOLevel = $level == $key;
                                $selecao = $esseEhOLevel ? "selected='selected'" : ''; 
                            ?>
                                <option value="<?= $key; ?>" <?= $selecao?>><?= $value ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Gênero do Usuário:</span>
                        <select class="form-select" name="user_genre">
                            <?php
                                $genero = array('1' => 'Masculino', '2' => 'Feminino');                                                    
                                foreach ($genero as $key => $value):                                                      
                                    $esseEhOGenero = $genre == $key;
                                    $selecao = $esseEhOGenero ? "selected='selected'" : ''; 
                            ?>
                                <option value="<?= $key; ?>" <?= $selecao?>><?= $value ?></option>
                            <?php
                               endforeach;
                            ?>
                        </select>
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Status do Usuário:</span>
                        <select class="form-select" name="user_status">
                            <?php
                                $status = array('1' => 'Ativo', '2' => 'Bloqueado');                                                    
                                foreach ($status as $key => $value):                                                      
                                    $esseEhOStatus = $statusU == $key;
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
                    <!--<input type="submit" class="btn_roxo btn btn-roxo" value="Enviar"/>-->  
                    <input type="submit" class="btn btn-blue" name="btnEnviar" value="Atualizar">               
                </div>
            </div>
        </form>           
    </div>
    <div class="clear"></div>
</div>
<?php
endif;

