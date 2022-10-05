<?php
require_once 'cabecalho.php';
?>
<div class="container container-titulo">
    <h2>Cadastro de Tarefas</h2>
</div>
    <div class="container container-form">
        <form action="controllers/controllerTarefas.php" method="POST">

            <div class="form-group">
                <label>Nome da Tarefa</label>
                <input type="text" class="form-control" name="txtNomeTarefa" required>
            </div>
			
            <div class="form-group">
                <label>Custo da Tarefa</label>
                <input type="text" class="form-control" name="txtCustoTarefa" required>
            </div>

            <div class="form-group">
                <label>Data Limite</label>
                <input type="date" class="form-control" name="txtDataTarefa" required>
            </div>
                
            </div>
			<center>
            <div class="formCliente-button">
                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                <button type="reset" class="btn btn-outline-dark">Limpar</button>
                <a href="exibirTarefas.php" =><button type="button" class="btn btn-outline-dark">Voltar</button></a>
            </div>
			</center>
            <input type="hidden" name="opcao" value="1">
        </form>

    </div>
<?php include_once 'rodape.php'?>
