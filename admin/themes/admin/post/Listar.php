
<div class="post-conteudo container">                   
    <div class="cad-form">
        <h1>Listar Posts</h1>

        <table>
            <thead>
                <tr>
                    <td>Cod</td>
                    <td>Titulo</td>
                    <td>Categoria</td>
                    <td>Data</td>
                    <td>Status</td>
                    <td>Ações</td>

                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 7; $i++):
                    ?>
                    <tr>
                        <td>00<?= $i ?></td>
                        <td>Novo titulo <?= $i ?></td>
                        <td>nova categoria</td>
                        <td>22/05/2018</td>
                        <td>Bloqueado</td>
                        <td>
                            <a href="#" title="Excluir" class="btn-delete"></a>
                            <a href="#" title="Atualizar" class="btn-update"></a>
                        </td>
                    </tr>

                    <?php
                endfor;
                ?>
            </tbody>
        </table>


        <div class="paginator">
            <ul class="pagination">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a class="active" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
    </div>


    <div class="clear"></div>
</div>
