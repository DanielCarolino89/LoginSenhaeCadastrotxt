<?php
    session_start(); // initial session

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ // se não existir loggedin no session ou loggedin não estiver valido volta para index.php
        header("location: index.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>DANIEL CAROLINO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;background-color:#FFFAFA}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px;}
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
        .wrapper{ width: 650px; padding: 20px;  margin: auto; margin-top: 20px;}

        .livros {display: block; width: 100%; overflow-x: auto;}
        .data-table {width: 100%; }
        table thead th {padding: 1rem 2rem; text-align: left;}
        table tbody td {padding: 1rem 2rem;}
        .caixa{border:solid; color:blue;text-align:center;margin-right:300px;margin-left:300px}
        td{text-transform: capitalize;}
    </style>

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 class=" text-black">Livraria FATEC</h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="page-header">
        <h1># BEM VINDO(A) A LIVRARIA FATEC #</h1>
    </div>
    <p>
        <a href="cadastro.php" class="btn btn-warning">CADASTRAR LIVROS</a>
        <br><br>
    </p>
    <h2>Livros cadastrados</h2>
    <br>
    <div class="caixa">
    <div class="wrapper">
        <section class="livros">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(file_exists("registro.txt")){ 
                            $file = file("registro.txt"); 
                            foreach($file as $line){ 
                                $line = trim($line);
                                $livro = explode(",",$line);
                                echo "<tr><td> $livro[0]</td><td>$livro[1]</td><td>$livro[2]</td>
                                </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    </div>
</body>
</html>