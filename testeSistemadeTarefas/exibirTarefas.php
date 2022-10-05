<?php
require_once 'cabecalho.php';
?>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container container-titulo" >
    <h2>Tarefas Cadastradas</h2>
</div>
    <div class="container container-tbl">
      <table class="table table-bordered table-hover table-responsive-md">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Custo (R$)</th>
            <th scope="col">data Limite</th>
            <th scope="col">Ordem</th>
            <th scope="col">Ação</th>
        </thead>
        <tbody>
          <?php

$tarefas     = $_SESSION['tarefas'];

foreach ($tarefas as $tarefa) {
	$date = new DateTime($tarefa->dataLimite);
	$c = $tarefa->custo;
	
	if($c >= 1000){
    echo "<tr bgcolor='#fdfd5a'>"; // inserindo cor nas linhas onde o custo é maior ou igual a 1000.
    echo "<td>" . $tarefa->id_tarefa . "</td>";
    echo "<td>" . $tarefa->nome . "</td>";
    echo "<td>" . number_format($tarefa->custo, 2, ',', '.') . "</td>";
    echo "<td>" . $date->format('d-m-Y') . "</td>";
	
    echo "<td><a href='controllers/controllerTarefas.php?opcao=6&ordem=" . $tarefa->ordem . "'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><title>Subir</title><path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z'/></svg></a>&nbsp&nbsp&nbsp";
	
    echo "<a href='controllers/controllerTarefas.php?opcao=7&ordem=" . $tarefa->ordem . "'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><title>Descer</title><path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z'/></svg></a></td>";
	
    echo "<td><a href='controllers/controllerTarefas.php?opcao=3&id_tarefa=" . $tarefa->id_tarefa . "'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='16' viewBox='0 0 14 16'><title>Alterar</title><path fill-rule='evenodd' d='M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z'/></svg></a>&nbsp&nbsp&nbsp";
	
    echo "<a href='controllers/controllerTarefas.php?opcao=4&id_tarefa=" . $tarefa->id_tarefa . "'onclick=\"return confirm('Tem certeza que deseja excluir esse registro?');\"><svg xmlns='http://www.w3.org/2000/svg' width='12' height='16' viewBox='0 0 12 16'><title>Excluir</title><path fill-rule='evenodd' d='M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z'/></svg></a></td>";
    echo "</tr>";
	}else{
		
	echo "<tr>";
    echo "<td>" . $tarefa->id_tarefa . "</td>";
    echo "<td>" . $tarefa->nome . "</td>";
    echo "<td>" . number_format($tarefa->custo, 2, ',', '.') . "</td>";
    echo "<td>" . $date->format('d-m-Y') . "</td>";
	
    echo "<td><a href='controllers/controllerTarefas.php?opcao=6&ordem=" . $tarefa->ordem . "'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><title>Subir</title><path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z'/></svg></a>&nbsp&nbsp&nbsp";
	
    echo "<a href='controllers/controllerTarefas.php?opcao=7&ordem=" . $tarefa->ordem . "'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><title>Descer</title><path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z'/></svg></a></td>";
	
    echo "<td><a href='controllers/controllerTarefas.php?opcao=3&id_tarefa=" . $tarefa->id_tarefa . "'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='16' viewBox='0 0 14 16'><title>Alterar</title><path fill-rule='evenodd' d='M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z'/></svg></a>&nbsp&nbsp&nbsp";
	
    echo "<a href='controllers/controllerTarefas.php?opcao=4&id_tarefa=" . $tarefa->id_tarefa . "'onclick=\"return confirm('Tem certeza que deseja excluir esse registro?');\"><svg xmlns='http://www.w3.org/2000/svg' width='12' height='16' viewBox='0 0 12 16'><title>Excluir</title><path fill-rule='evenodd' d='M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z'/></svg></a></td>";
    echo "</tr>";
	}
}
?>
        </tbody>
      </table>
    </div>
	<center>
    <div class="container">
        
		<a href="formTarefas.php">
            <button class="btn btn-outline-dark">Incluir tarefa</button>
        </a>
		
    </div>
	</center>
<?php
require_once 'rodape.php';
?>