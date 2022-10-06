<?php

require_once 'conexao.php';

class TarefaDAO
{
    private $con;
	
    public function TarefaDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirTarefa(Tarefa $tarefa)
    {
        try {
            $sql = $this->con->prepare("insert into tarefas(nome,custo,dataLimite,ordem) values (:nome,:custo,:data,:ordem)");
			
            $sql->bindValue(':nome', $tarefa->getNome());
            $sql->bindValue(':custo', $tarefa->getCusto());
            $sql->bindValue(':data', $tarefa->getdataLimite());
            $sql->bindValue(':ordem', $tarefa->getordem());
            
			
            $sql->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }

    }
	public function verificaDado($nome)
    {
		$sql = $this->con->prepare('SELECT * FROM tarefas WHERE nome = :nome');
		
		$sql->bindValue(':nome', $nome);
		$sql->execute();
		
		$x = $sql->fetch(PDO::FETCH_NUM);
				
		return $x;
	}
			
	public function getLastOrdem()
    {
        $ordem = $this->con->query("Select MAX(ordem) AS max_order FROM tarefas"); 
		$intNum = $ordem -> fetch(PDO::FETCH_ASSOC);
		$order = $intNum['max_order'];

        return $order;
		
    }
	
	public function getFirstOrdem()
    {
        $ordem = $this->con->query("Select MIN(ordem) AS min_order FROM tarefas"); 
		$intNum = $ordem -> fetch(PDO::FETCH_ASSOC);
		$order = $intNum['min_order'];

        return $order;
    }

    public function getTarefas()
    {
        $rs = $this->con->query("SELECT * FROM tarefas ORDER BY ordem"); 

        $lista = array();

        while ($tarefa = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $tarefa;
        }
        return $lista;
    }

    public function getTarefasPorId($id_tarefa)
    {
        $sql = $this->con->prepare("SELECT * FROM tarefas WHERE id_tarefa LIKE :id_tarefa");
        $sql->bindValue(':id_tarefa', $id_tarefa . '%');
        $rs = $sql->execute();

        $lista = array();

        while ($tarefa = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $tarefa;
        }
        return $lista;
    }

    public function excluirTarefa($id_tarefa)
    {
        $sql = $this->con->prepare("DELETE FROM tarefas WHERE id_tarefa = :id_tarefa");

        $sql->bindValue(':id_tarefa', $id_tarefa);
        $sql->execute();
    }

    public function atualizarTarefa(Tarefa $tarefa, $id_tarefa)
    {
		
        $sql = $this->con->prepare("update tarefas set nome = :nome, custo = :custo, dataLimite = :data, ordem = :ordem where id_tarefa = :id_tarefa");

			$sql->bindValue(':nome', $tarefa->getNome());
			$sql->bindValue(':custo', $tarefa->getCusto());
            $sql->bindValue(':data', $tarefa->getdataLimite());
            $sql->bindValue(':ordem', $tarefa->getordem());
            $sql->bindValue(':id_tarefa', $id_tarefa);

        $sql->execute();

    }

    public function getTarefa($id_tarefa)
    {
        $sql = $this->con->prepare('SELECT * FROM tarefas WHERE id_tarefa= :id_tarefa');

        $sql->bindValue(':id_tarefa', $id_tarefa);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }
	
	public function atualizarOrdem($id_ordem1, $id_ordem2)
    {
		$sql = $this->con->prepare("UPDATE tarefas AS tarefas1 JOIN tarefas AS tarefas2 ON ( tarefas1.ordem = :id_ordem1 AND tarefas2.ordem = :id_ordem2 ) SET tarefas1.ordem = tarefas2.ordem, tarefas2.ordem = tarefas1.ordem");

			$sql->bindValue(':id_ordem1', $id_ordem1);
			$sql->bindValue(':id_ordem2', $id_ordem2);
            

        $sql->execute();

    }
	
}