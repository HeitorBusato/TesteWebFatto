<?php
class Tarefa
{
    private $id_tarefa;
    private $nome;
    private $custo;
    private $dataLimite;
	private $ordem;

    public function Tarefa($nome, $custo, $dataLimite, $ordem)
    {
        
        $this->nome = $nome;
        $this->custo = $custo;
        $this->dataLimite = $dataLimite;
        $this->ordem = $ordem;
       		
    }

    public function getId_tarefa()
    {
        return $this->id_tarefa;
    }
	
	 public function setId_tarefa($id_tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCusto()
    {
        return $this->custo;
    }

    public function setCusto($custo)
    {
        $this->custo = $custo;
		
    }
	
	public function getdataLimite()
    {
        return $this->dataLimite;
    }

    public function setdataLimite($dataLimite)
    {
        $this->dataLimite = $dataLimite;
    }

    public function getordem()
    {
        return $this->ordem;
    }

    public function setordem($ordem)
    {
        $this->ordem = $ordem;
    }

}
