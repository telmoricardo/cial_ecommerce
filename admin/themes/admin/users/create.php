<?php
$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);

$usuario = new User();
$usuarioController = new UserController();

$resultado = "";

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
    $usuario->setUser_genre(filter_input(INPUT_POST, 'user_genre', FILTER_SANITIZE_STRING));
    $usuario->setUser_status(filter_input(INPUT_POST, 'user_status', FILTER_SANITIZE_STRING));
    $registration = date("Y-m-d H:i:s");
    $usuario->setUser_registration($registration);  
    
    echo '<pre>';
    print_r($usuario);
    echo '</pre>';
    
    if($usuarioController->cadastrar($usuario)):
       $resultado = '<div class="trigger trigger-accept">
                        <p><b class="trigger-accept-bold">Sucesso:</b> Usuário cadastrado!</p>
                      </div>';
        $insertGoTo = HOME."/users/create";
        header("refresh:2;url={$insertGoTo}");
    else:
         $resultado = '<div class="trigger trigger-alert">
                        <p><b class="trigger-accept-bold">Error:</b> Favor preencha todos campos
                        
!</p>
                      </div>';
        
    endif;
endif;
?>
<div class="post-conteudo container">                   
    <div class="cad-form">
        <h1>Novo Usuário</h1>
        <form method="post" class="fl-left box-full" >
            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">Primeiro Nome:</span>
                        <input value="" type="text" name="user_name" placeholder="Primeiro Nome:"  />
                    </label>                       
                </div>
                <div class="column column-6">
                    <label>
                        <span class="form-field">Sobrenome:</span>
                        <input value="" type="text" name="user_lastname" placeholder="Sobrenome:"  />
                    </label>                       
                </div>
                <div class="column column-2">
                    <label>
                        <span class="form-field">CPF:</span>
                        <input value="" type="text" name="user_document" class="formCpf" placeholder="CPF:"  />
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">Telefone:</span>
                        <input value="" class="formPhone" type="text" name="user_telephone" placeholder="(55) 5555.5555" />
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">Celular:</span>
                        <input value="" class="formPhone" type="text" name="user_cell" placeholder="(55) 55555.5555" />
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">E-mail:</span>
                        <input value="" type="email" name="user_email" placeholder="E-mail:"  />
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-3">
                    <label>
                        <span class="form-field">Senha: (Entre 5 e 11 caracteres):</span>
                        <input value="" type="password" name="user_password" placeholder="Senha:" />
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Nível de acesso:</span>
                        <select class="form-select" name="user_level">
                            <option selected disabled value="">Selecione o nível de acesso:</option>
                            <?php
                            $NivelDeAcesso = getLevel();
                            foreach ($NivelDeAcesso as $Nivel => $Desc):
                                if ($Nivel):
                                    echo "<option";
                                    if ($Nivel):
                                        echo " selected='selected'";
                                    endif;
                                    echo " value='{$Nivel}'>{$Desc}</option>";
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Gênero do Usuário:</span>
                        <select class="form-select" name="user_genre">
                            <option selected disabled value="">Selecione o Gênero do Usuário:</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                    </label>                       
                </div>
                <div class="column column-3">
                    <label>
                        <span class="form-field">Status do Usuário:</span>
                        <select class="form-select" name="user_status">
                            <option selected disabled value="">Selecione o Status do Usuário:</option>
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
                    <!--<input type="submit" class="btn_roxo btn btn-roxo" value="Enviar"/>-->  
                    <input type="submit" class="btn btn-green" name="btnEnviar" value="Enviar">               
                </div>
            </div>
        </form>           
    </div>
    <div class="clear"></div>
</div>


