<?php
    session_start(); // initial session

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){// se não existir loggedin no session ou loggedin não estiver valido volta para index.php
        header("location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for codigo Post
        if( $_POST['codigo'] != ""  &&   $_POST['nome'] != "" && $_POST['autor'] != "")  { // verifica se não são vázio os campos
            $codigo = $_POST['codigo'];
            $nome = $_POST['nome'];
            $autor = $_POST['autor']; 
            $filename = "registro.txt";

            // verifica se o arquivo existe. retorna bool
            if (!file_exists($filename)) {
                $handle = fopen($filename, "w");
            } else {
                $handle = fopen($filename, "a");
            }

            fwrite($handle,"$codigo,$nome,$autor\n");

            fflush($handle);

            fclose($handle);

            header("location: inicio.php");
        }
    }
      
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANIEL CAROLINO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif;background-color:#FFFAFA }
        .wrapper{ width: 450px; padding: 20px;  margin: auto; margin-top: 50px;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px; }
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
        table{margin-left:340px}
        img{width:300px;padding:20px}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3><a class="text-black" href="inicio.php">Cadastro de livros</a></h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>
    <table>
            <tr>
            <td><img src="img\livros.png" alt=""></td>
    <td><div class="wrapper">
        <h2>Cadastro de novo livro</h2><br>
    
            <form action="cadastro.php" method="post">
            <div class="form-group">
            
            <div class="form-group">
                <label>Código:</label>
                <input type="text" name="codigo" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Nome do livro:</label>
                <input type="text" name="nome" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ENVIAR">
            </div>
        </form>
    </div>   
</td>
</tr>
</table> 
</body>
</html>