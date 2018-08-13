<?php
  require_once 'crudPaciente.php';
  $obj=new CrudPac();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);

    if($num>0){
      echo "<link rel='stylesheet' type='text/css'  href='../CSS/tbvacinacao.css' />";
        echo "<table border=1>";
        echo "<tr>
                <th> Codigo </th>
                <th> Email </th>
                <th> Nome </th>
                <th> Data de Nascimento </th>
                <th> Cidade </th>
                <th> Bairro </th>
                <th> CPF </th>
                <th> RG </th>
                <th> Número </th>
                <th> Observações </th>
                <th> Rua </th>
                <th> Opçao</th>
            </tr>";
            while($array=mysqli_fetch_object($query)){
              echo "<tr>";
                echo "<td>".$array->IdPaciente."</td>";
                echo "<td>".$array->Email."</td>";
                echo "<td>".$array->Nome."</td>";
                echo "<td>".$array->DataNascimento."</td>";
                echo "<td>".$array->Cidade."</td>";
                echo "<td>".$array->Bairro."</td>";
                echo "<td>".$array->CPF."</td>";
                echo "<td>".$array->RG."</td>";
                echo "<td>".$array->Numero."</td>";
                echo "<td>".$array->Observacoes."</td>";
                echo "<td>".$array->Rua."</td>";
                echo "<td>
                        <a href='formAlterarPaciente.php?id=".$array->IdPaciente."'>Alterar</a> | <a href='crudPaciente.php?acao=2&id=".$array->IdPaciente."'>Excluir</a>
                      </td> 
              </tr>";
            }
            echo "<tr>
                <td colspan=11><a href='formCadastroPaciente.php'>+++++++ CADASTRAR PACIENTE ++++++++</a></td>
              </tr>";
        echo "<table>";
        echo "<hr>  ".$num." registros de Pacientes";
  }else{
      echo "Não há registros no banco de dados";
  }
  echo "<h3><a href='../menu.html'>Voltar para o Menu</a></h3>";
?>