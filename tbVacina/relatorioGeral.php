<?php
  require_once 'crud.php';
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);

    if($num>0){
        echo "<link rel='stylesheet' type='text/css'  href='../CSS/tbvacinacao.css' />";
        echo "<table border=1>";
        echo "<tr>
                <th> ID da Vacina </th>
                <th> Nome </th>
                <th> Duração </th>
                <th> Descrição </th>
                <th> Idade Minima </th>
                <th> Idade Maxima </th>
                <th>Opcão</th>
            </tr>";
            while($array=mysqli_fetch_object($query)){
              echo "<tr>";
                echo "<td>".$array->idVacina."</td>";
                echo "<td>".$array->nome."</td>";
                echo "<td>".$array->Duracao."</td>";
                echo "<td>".$array->Descricao."</td>";
                echo "<td>".$array->idadeMinima."</td>";
                echo "<td>".$array->idadeMaxima."</td>";
                echo "<td>
                        <a href='formAlterar.php?id=".$array->idVacina."'>Alterar</a> |
                         <a href='crud.php?acao=2&id=".$array->idVacina."'>Excluir</a> 
                      </td> 
              </tr>";
            }
              echo "<tr>
                <td colspan=12><a href='formCadastro.php'> ++++++CADASTRAR VACINA+++++++</a></td>
              </tr>";
        echo "<table>";
        echo "<hr>  ".$num." registros cadastrados";
  }else{
      echo "Não há registros no banco de dados";
  }
  echo "<h3><a href='../menu.html'>Voltar para o Menu</a></h3>";
?>