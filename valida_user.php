<?PHP
    session_start();
    function sair (){
	    session_destroy();
	    header("Location: login.php");
	    exit();
    }
    $obj=new CrudPac();
    $query=$obj->listar();
    require "tbPaciente/crudPaciente.php";
    if($_REQUEST["action"] == "login"){
        while($array=mysqli_fetch_object($query)){
            if($_REQUEST["CAMPO_USUARIO"]==$array->Nome && $_REQUEST["CAMPO_SENHA"]==$array->Senha){
                $_SESSION["usuario"] = $_POST["CAMPO_USUARIO"];
                $_SESSION["autenticado"] = TRUE;
                header("Location: menu.php");
            }else{
                echo "Seu nome de usuário ou senha estão incorretos.";
            }
        }
    }else{ 
        if (isset ($_GET["acao"])){
            sair();
        }
    }
 ?>
 <html><BR><BR><a href="login.php"><<--Retornar ao login </a><BR> </html>

