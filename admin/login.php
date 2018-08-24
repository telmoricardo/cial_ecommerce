<?php
require_once '../app/ConfigAdmin.inc.php';
//set_time_limit(0); 
$userController = new UserController();

$resultado = "";

if ($userController->isLoggedIn()):
    header("Location: index.php");
endif;

$btnLogar = filter_input(INPUT_POST, 'btnLogar', FILTER_SANITIZE_STRING);
if ($btnLogar):
    $email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);

    //Email e Senha não pode estar vazio
    if ($email != null && !empty($email) && $password != null && !empty($password)):
        $pegarSenha = $userController->verificarEmail($email);
        $senha = $pegarSenha->getUser_password();
        $hash = $senha;
        if (password_verify($password, $hash)) {

            $validarUsuario = $userController->validarUser($email, $hash);
            if ($validarUsuario != null):
                $_SESSION["id"] = $validarUsuario->getUser_id();
                $_SESSION["name"] = $validarUsuario->getUser_name();
                $_SESSION["level"] = $validarUsuario->getUser_level();
                $_SESSION["logado"] = true;

                $idUser = $_SESSION["id"];
                if ($idUser > 0):
                    $dataAccess = $lastupdate = date("Y-m-d H:i:s");
                    $userController->lastAccess($idUser, $dataAccess);
                endif;

                //se usuário existir, redirecionamento para pagina checkout
                $insertGoTo = 'index';
                header("refresh:3;url={$insertGoTo}");
                $resultado = "<div class='alert alert-success'>           
                    <span>Seja Bem-vindo <b>{$_SESSION["name"]} </b>, estamos redirecionando para o painel administrativo</b></span>
                </div>";
            endif;
        } else {
            $resultado = "<div class='alert alert-danger'>           
                <span><b>Informe, </b> E-mail e Senha estão incorretos!</span>
            </div>";
        }
    else:
        $resultado = "<div class='alert alert-warning'>           
                    <span><b>Informe, </b> e-mail e senha para acessar o painel!</span>
                </div>";
    endif;
endif;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Login</title>
        <link href="<?= INCLUDE_PATH; ?>/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-center">Bem-Vindo</h1>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="user_email" class="form-control input-lg" placeholder="E-mail"/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="user_password" class="form-control input-lg" placeholder="Senha"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btnLogar" class="btn btn-block btn-lg btn-primary" value="Entrar"/>
                            <!--<span><a href="#">Esquece a Senha?</a></span>-->
                        </div>

                        <div class="form-group">
                            <?= $resultado; ?>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
