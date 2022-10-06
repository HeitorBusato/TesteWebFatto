<?php
require_once 'cabecalho.php';

if (!isset($_SESSION)) {
    session_start();
}

$tarefa = $_SESSION['tarefa'];
?>
	<div class="container container-titulo" >
    <h2>Atualizar tarefas cadastrados</h2>
	</div>
    <div class="container container-form formCliente-button">
        <form action="controllers/controllerTarefas.php" method="POST">

            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txtIdTarefa" value ="<?php echo $tarefa->id_tarefa ?>" readonly required>
            </div>

            <div class="form-group">
                <label>Nome da Tarefa</label>
                <input type="text" class="form-control" name="txtNomeTarefa" value="<?php echo $tarefa->nome ?>"required>
            </div>
			
			<div class="form-group">
                <label>Custo da Tarefa</label>
                <input type="text" class="form-control" name="txtCustoTarefa" value="<?php echo $tarefa->custo ?>"required>
            </div>
           
			<div class="form-group">
                <label>Data Limite</label>
                <input type="date" class="form-control" name="txtDataTarefa" value="<?php echo $tarefa->dataLimite ?>" required>
            </div>

            <div class="form-group">
                <label>Ordem da Tarefa</label>
                <input type="text" class="form-control" name="txtOrdemTarefa" value ="<?php echo $tarefa->ordem ?>" readonly required>
            </div>

<?php      
    
?>
    
            </div>
			<center>
                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <a href="exibirTarefas.php" =><button type="button" class="btn btn-outline-dark">Voltar</button></a>
			</center>
            <input type="hidden" name="opcao" value="5">
        </form>

    </div>
<?php require_once 'rodape.php'?>