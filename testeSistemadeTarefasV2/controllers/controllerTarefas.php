<?php

require_once '../model/tarefa.php';
require_once '../dao/tarefaDAO.php';

$opcao = (int) $_REQUEST['opcao'];


if ($opcao == 1) { // Incluir tarefa
	
	$tarefaDAOO = new TarefaDAO();
			
	$ordem = ($tarefaDAOO->getLastOrdem() + 1); //obtendo a ultima ordem da lista e incrementando.
	
	$x = $tarefaDAOO->verificaDado($_REQUEST['txtNomeTarefa']); //verificando o nome na lista
	
	if($x <= 0){
		$tarefa = new Tarefa($_REQUEST['txtNomeTarefa'], $_REQUEST['txtCustoTarefa'], $_REQUEST['txtDataTarefa'], $ordem);
	
		$tarefaDAO = new TarefaDAO();	
	
		$tarefaDAO->incluirTarefa($tarefa);
	}		 

    header("Location: controllerTarefas.php?opcao=2");
}

if ($opcao == 2) { // Consultar todas tarefas
    $tarefaDAO = new TarefaDAO();
    session_start();
    $_SESSION['tarefas'] = $tarefaDAO->getTarefas();
    header("Location: ../exibirTarefas.php");
}

if ($opcao == 3) { // Pegar um tarefa
    $tarefas      = $_REQUEST['id_tarefa'];
    $tarefaDAO = new TarefaDAO();
    $tarefa    = $tarefaDAO->getTarefa($tarefas);
    session_start();
    $_SESSION['tarefa'] = $tarefa;
    header("Location: ../atualizarTarefas.php");
}

if ($opcao == 4) { // Remover tarefa
    $tarefa      = $_REQUEST['id_tarefa'];
    $tarefaDAO = new TarefaDAO();
    $tarefaDAO->excluirTarefa($tarefa);
    header("Location: controllerTarefas.php?opcao=2");
}

if ($opcao == 5) { // Atualizar tarefa
	session_start();
	$Id = $_SESSION['tarefa'];
	$id = $Id->id_tarefa;
	
	$tarefaDAOO = new TarefaDAO();
	$x = $tarefaDAOO->verificaDado($_REQUEST['txtNomeTarefa']); //verificando o nome na lista
		
		
		$tarefa = new Tarefa($_REQUEST['txtNomeTarefa'], $_REQUEST['txtCustoTarefa'], $_REQUEST['txtDataTarefa'], $_REQUEST['txtOrdemTarefa']);
    
		$tarefaDAO = new TarefaDAO();
		$tarefaDAO->atualizarTarefa($tarefa,$id);
	
		
    header("Location: controllerTarefas.php?opcao=2");
}

if ($opcao == 6) { // Subir tarefa
	session_start();
	$tarefas = $_SESSION['tarefas'];
    $ordem      = $_REQUEST['ordem'];
	$novaordem;
    $tarefaDAO = new TarefaDAO();
		//tratando o caso em que a tarefa é a primeira da lista
	if(($tarefaDAO->getFirstOrdem())==$ordem){
		header("Location: controllerTarefas.php?opcao=2");
	}else{
		foreach ($tarefas as $tarefa) {
			if(($tarefa->ordem)<($ordem)){
				$novaordem = $tarefa->ordem;
			}
		}
		$tarefaDAO->atualizarOrdem($ordem,$novaordem);
		header("Location: controllerTarefas.php?opcao=2");
	}
}

if ($opcao == 7) { // descer tarefa
	session_start();
	$tarefas = $_SESSION['tarefas'];
    $ordem      = $_REQUEST['ordem'];
	$novaordem;
    $tarefaDAO = new TarefaDAO();
		//tratando o caso em que a tarefa é a ultima da lista
	if(($tarefaDAO->getLastOrdem())==$ordem){
		header("Location: controllerTarefas.php?opcao=2");
	}else{
		foreach ($tarefas as $tarefa) {
			
			if(($tarefa->ordem)>($ordem)){
				$novaordem = $tarefa->ordem;
				break;
			}
		}
		$tarefaDAO->atualizarOrdem($ordem,$novaordem);
		header("Location: controllerTarefas.php?opcao=2");
	}
}