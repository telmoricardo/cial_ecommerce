<div class="post-conteudo container">                   
    <div class="cad-form">
        <h1>Novo Post</h1>
        <form method="post" class="fl-left box-full" id="ajax/post">
            <div class="row">
                <div class="column column-12">
                    <label>
                        <span class="form-field">Capa do Post:</span>
                        <input type="file" name="thumb"/>
                    </label>                       
                </div>
            </div>
            <div class="row">
                <div class="column column-12">
                    <label>
                        <span class="form-field">Titulo do Post:</span>
                        <input type="text" name="nome" placeholder="Titulo do Post:"/>
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-4">
                    <label>
                        <span class="form-field">Data:</span>
                        <input type="text" name="data" placeholder="Informe a data:"/>
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">Categoria:</span>
                        <select class="form-select">
                            <option value="">Selecione a categoria</option>
                            <option value="1">Categoria 1</option>
                            <option value="2">Categoria 2</option>
                        </select>
                    </label>                       
                </div>
                <div class="column column-4">
                    <label>
                        <span class="form-field">Status:</span>
                        <select class="form-select">
                            <option value="">Selecione o status</option>
                            <option value="1">Ativo</option>
                            <option value="2">Bloqueado</option>
                        </select>
                    </label>                       
                </div>
            </div>

            <div class="row">
                <div class="column column-12">
                    <label>
                        <span class="form-field">Mensagem:</span>
                        <textarea rows="3" name="mensagem"></textarea>
                    </label>                         
                </div>
            </div>

            <div class="row">
                <div class="column column-12">
                    <label>
                        <span class="form-field">Palavras-chaves:</span>
                        <input type="text" name="words-keys" placeholder="Informe as palavras-chaves:"/>
                    </label>                       
                </div>

            </div>
            <div class="row">
                <div class="column column-2">
                    <!--<input type="submit" class="btn_roxo btn btn-roxo" value="Enviar"/>-->  
                    <button type="submit" class="btn btn-success"><i class="icone "></i> Enviar</button>                     
                </div>
            </div>
        </form>           
    </div>
    <div class="clear"></div>
</div>


