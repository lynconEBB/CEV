<?php
  require_once "../conexao.php";
    class Crud{
        private $con;
     function __construct(){
         $this->con=Conexao::conectar();
         if(isset($_REQUEST["acao"])){
             $acao=$_REQUEST["acao"];
             $this->verificaAcao($acao);
         }
     }
     function verificaAcao($acao){
         switch ($acao){
             case 1:
                 $this->inserir();
                 break;
             case 2:
                 $this->excluir();
                 break;
             case 3:
                 $this->listaPorId();
                 break;
             case 4:
                 $this->alterar();
                 break;
         }
     }

    function retornarNome($id){
        $sql="select nome from tbVacina where IdVacina=".$id ;
        $query=mysqli_query($this->con, $sql);
        return $query;
    }
    function listaPorId(){
      $sql="select * from tbVacina where idVacina=".$_REQUEST["id"] ;
      $query=mysqli_query($this->con, $sql);
      return $query;
    }

    function inserir(){
  		$sql="insert into tbVacina(nome, Duracao, Descricao, idadeMinima, idadeMaxima) values ('".$_REQUEST["nome"]."','".$_REQUEST["Duracao"]."','".$_REQUEST["Descricao"]."','".$_REQUEST["idadeMinima"]."','".$_REQUEST["idadeMaxima"]."')";
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeral.php");
    }
     
    function listar(){
      $sql="select * from tbVacina";
      $query=mysqli_query($this->con, $sql);
      return $query; 
    }

    function excluir(){
      $sql="delete from tbVacina where idVacina=".$_REQUEST["id"];
      $msg="Erro ao excluir o registro<hr>";
      mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
      header("Location:relatorioGeral.php");
    }

    function alterar(){
      $sql="update tbVacina set nome='".$_POST["nome"]."', Duracao='".$_POST["Duracao"]."', Descricao='".$_POST["Descricao"]."', idadeMinima='".$_POST["idadeMinima"]."', idadeMaxima='".$_POST["idadeMaxima"]."' where idVacina='".$_REQUEST["id"]."'";        
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeral.php");   
    }
  }
new Crud();