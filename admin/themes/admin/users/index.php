<?php
//instanciando a classe
$userController = new UserController();
$helper = new Helper();

$resultado = "";

/** Pegando o cod que esta vindo através da url del * */
$deletar = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
if ($deletar):
    //pegando os dados do slider
//    $retornoSlider = $sliderController->retornaSlider($btnExcluir);
//    $thumbSlider = $retornoSlider->getSlider_thumb();    
//    
//    $capa = "../upload/" . $thumbSlider;    
//    if (file_exists($capa) && !is_dir($capa)):
//        unlink($capa);
//    endif;

    if ($userController->Excluir($deletar)):
        $resultado = "<div class=\"alert alert-success\">O usuário </b> foi removido com sucesso</div>";
    else:
        $resultado = "<div class=\"alert alert-danger\">Erro ao remover o usuário</div>";
    endif;
endif;

//máximo de links na paginação
$maxlinks = 4;
$pagina = (isset($_GET['pagina'])) ? ($_GET['pagina']) : 1;
//quantidade de publicação por páginas
$maximo = 10;
$inicio = (($maximo * $pagina) - $maximo);

//chamando o objeto listarUsuarios
$listaUser = $userController->Pager($inicio, $maximo);

if ($listaUser == null):
else:
    ?>
    <div class="post-conteudo container">
        <div class="cad-form">        
            <h1>Listar Usuários</h1>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>E-mail</td>
                        <td>Última Atualização</td>
                        <td>Último Acesso</td>
                        <td>Nível</td>
                        <td>Status</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaUser as $user):
                        ?>
                        <tr>
                            <td><?= $user->getUser_id(); ?></td>
                            <td><?= $user->getUser_name(); ?></td>
                            <td><?= $user->getUser_email(); ?></td>
                            <td><?= $helper->converteData($user->getUser_lastupdate()); ?></td>
                            <td><?= $helper->converteData($user->getUser_lastacess()); ?></td>                          
                            <td>
                                <?php
                                $NivelDeAcesso = getLevel();
                                $user->getUser_level();
                                foreach ($NivelDeAcesso as $nivel => $desc):
                                    $esseEhLevel = $user->getUser_level() == $nivel;
                                    echo ($esseEhLevel) ? $desc : '';
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($user->getUser_status() == 1):
                                    echo "Ativo";
                                else:
                                    echo "Bloqueado";
                                endif;
                                ?>
                            </td>
                            <td>
                                <a href="<?= HOME; ?>/users/index&del=<?= $user->getUser_id(); ?>" title="Excluir" class="btn-delete" onclick="return confirm('Deseja realmente excluir o produto <?= $user->getUser_name(); ?>');"></a>
                                <a href="<?= HOME; ?>/users/update&cod=<?= $user->getUser_id(); ?>" title="Atualizar" class="btn-update"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

            <?php
            //paginação de resultados
            $total = $userController->RetornaQtdUser();
            $total_paginas = ceil($total / $maximo);
            if ($total > $maximo):                
                echo '<div class="paginator">';
                echo '<ul class="pagination">';
                    echo '<li><a href="Listar&pagina=1">Primeira Página</a></li>';
                    for ($i = $pagina - $maxlinks; $i <= $pagina - 1; $i++):
                        if ($i >= 1):
                            echo '<li><a href="Listar&pagina=' . $i . '">' . $i . '</a><li>';
                        endif;
                    endfor;
                    echo '<li><a class="active" href="Listar&pagina=' . $pagina . '">' . $pagina . '</a></li>';
                    for ($i = $pagina + 1; $i <= $pagina + $maxlinks; $i++):
                        if ($i <= $total_paginas):
                            echo '<li><a href="Listar&pagina=' . $i . '">' . $i . '</a></li>';
                        endif;
                    endfor;
                    echo '<li><a href="Listar&pagina=' . $total_paginas . '"">Última Página</a></li>';
                echo '</ul>';
                echo '</div>';
            endif;            
            ?>
        </div>
        <div class="clear"></div>
    </div>
<?php
endif;
?>