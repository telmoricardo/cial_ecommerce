<div class="admin-conteudo container">                   
    <div class="admin-row">
        <div class="row-title bg-verde">
            <i class="shoticon shoticon-online"></i>
            <h1>ONLINE AGORA</h1>
        </div>
        <div class="row-conteudo">
            <i class="shoticon shoticon-team"></i>
            <h1>002</h1>
            <a href="#" class="btn-row">ACOMPANHAR USUARIOS</a>
        </div>
    </div>

    <div class="admin-row">
        <div class="row-title bg-azul">
            <i class="shoticon shoticon-visit"></i>
            <h1>VISITAS HOJE</h1>
        </div>
        <div class="row-conteudo">
            <div class="row-view">
                <h2>0003</h2>
                <p>USUÁRIOS</p>
            </div>
            <div class="row-view">
                <h2>0012</h2>
                <p>VIEW</p>
            </div>
            <div class="row-view">
                <h2>0040</h2>
                <p>PÁGINAS</p>
            </div>
            <a href="#" class="btn-row">333 PÁGINAS POR VISITAS</a>
        </div>
    </div>

    <div class="admin-row">
        <div class="row-title bg-amarelo">
            <i class="shoticon shoticon-visit"></i>
            <h1>VISITAS NO MÊS</h1>
        </div>
        <div class="row-conteudo">
            <div class="row-view">
                <h2>0003</h2>
                <p>USUÁRIOS</p>
            </div>
            <div class="row-view">
                <h2>0012</h2>
                <p>VIEW</p>
            </div>
            <div class="row-view">
                <h2>0040</h2>
                <p>PÁGINAS</p>
            </div>
            <a href="#" class="btn-row">333 PÁGINAS POR VISITAS</a>
        </div>
    </div>

    <div class="admin-row">
        <div class="row-title bg-vermelho">
            <i class="shoticon shoticon-sales"></i>
            <h1>VENDAS NO MÊS</h1>
        </div>
        <div class="row-conteudo">
            <div class="row-view">
                <h2>0003</h2>
                <p>TODAS</p>
            </div>
            <div class="row-view">
                <h2>0012</h2>
                <p>APROV.</p>
            </div>
            <div class="row-view">
                <h2>0040</h2>
                <p>AGUARD.</p>
            </div>
            <a href="#" class="btn-row">TOTAL R$ 00.00 EM VENDA</a>
        </div>

    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="content">
        <div class="row-footer">
            <div class="row-title bg-verde">
                <i class="shoticon shoticon-order"></i>
                <h1>ÚLTIMOS PEDIDOS</h1>
            </div>
            <div class="tabela">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#0000258</td>
                            <td>11/05/2018</td>
                            <td>R$ 95,00</td>
                            <td>Aguar. Pagamento</td>
                        </tr>
                        <tr>
                            <td>#0000259</td>
                            <td>12/05/2018</td>
                            <td>R$ 195,00</td>
                            <td>Pago</td>
                        </tr>
                        <tr>
                            <td>#0000260</td>
                            <td>12/05/2018</td>
                            <td>R$ 295,00</td>
                            <td>Cancelado</td>
                        </tr>
                        <tr>
                            <td>#0000258</td>
                            <td>11/05/2018</td>
                            <td>R$ 95,00</td>
                            <td>Aguar. Pagamento</td>
                        </tr>
                        <tr>
                            <td>#0000259</td>
                            <td>12/05/2018</td>
                            <td>R$ 195,00</td>
                            <td>Pago</td>
                        </tr>
                        <tr>
                            <td>#0000260</td>
                            <td>12/05/2018</td>
                            <td>R$ 295,00</td>
                            <td>Cancelado</td>
                        </tr>
                        <tr>
                            <td>#0000259</td>
                            <td>12/05/2018</td>
                            <td>R$ 195,00</td>
                            <td>Pago</td>
                        </tr>
                        <tr>
                            <td>#0000260</td>
                            <td>12/05/2018</td>
                            <td>R$ 295,00</td>
                            <td>Cancelado</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row-footer">
            <div class="row-title bg-azul">
                <i class="shoticon shoticon-comment"></i>
                <h1>COMENTÁRIOS/AVALIAÇÕES</h1>
            </div>
            <?php
            for ($i = 0; $i <= 4; $i++):
                ?>
                <div class="row-footer-com">
                    <img src="<?= INCLUDE_PATH;?>/images/man.png" class="footer-thumb boxshadow">
                    <h2>Telmo Ricardo - 15/05/2018</h2>
                    <p>em: Estou testando o comentário </p>
                    <div class="row-comment">
                        <img src="<?= INCLUDE_PATH;?>/images/star.png" class="star">                                 
                        <img src="<?= INCLUDE_PATH;?>/images/star.png" class="star">                                 
                        <img src="<?= INCLUDE_PATH;?>/images/star.png" class="star">                                 
                        <img src="<?= INCLUDE_PATH;?>/images/star.png" class="star">                                 
                        <img src="<?= INCLUDE_PATH;?>/images/star.png" class="star">                                 
                                                        
                    </div>
                </div>
                <?php
            endfor;
            ?>
        </div>
    </div>
</div>