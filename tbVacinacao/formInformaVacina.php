<meta charset="utf-8">
<html>
   <head>
        <title>Informar Vacina</title>
        <link rel="stylesheet" type="text/css"  href="../CSS/tbvacinacao.css" />
   </head>
   <body>	
      <h1> Escolha a Vacina</h1>
      <?php
        require_once '../tbVacina/crud.php';
        $obj=new Crud();
        $query=$obj->listar();
        $num=mysqli_num_rows($query);
        $idPaciente = $_REQUEST["idPac"];
        echo "<table border=1>";
            echo "<tr>
                <th> ID da Vacina </th>
                <th> Nome </th>
                <th> Duração </th>
                <th> Descrição </th>
                <th> Idade Minima </th>
                <th> Idade Maxima </th>
                <th> Escolha </th>
            </tr>";
            while($array=mysqli_fetch_object($query)){
            echo "<tr>";
                echo "<td>".$array->idVacina."</td>";
                echo "<td>".$array->nome."</td>";
                echo "<td>".$array->Duracao."</td>";
                echo "<td>".$array->Descricao."</td>";
                echo "<td>".$array->idadeMinima."</td>";
                echo "<td>".$array->idadeMaxima."</td>";
                echo "<td> <a href='formCadastroVacinação.php?idVac=".$array->idVacina."&idPac=".$idPaciente."'>Escolher</a> </td> 
            </tr>";
            }
        echo "</table>";
         ?>
   </body>
</html>