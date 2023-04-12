<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for tipo Post
        session_start(); // inicializa session 
        if($_POST['username'] == 'fatec' and $_POST['password'] == 'araras'){ // se o usuario e senha for valido
            $_SESSION['loggedin'] = TRUE; // seta no session loggedin verdadeiro
            $_SESSION["username"] = 'Fatec';  // seta no session usuario DANIEL 
            header("location: inicio.php"); // redireciona para inicio
        } else {
            $_SESSION['loggedin'] = FALSE; // se não seta no session loggedin falso
            $_SESSION["username"] = 'iNVALIDO';
        }
    }
?>
 
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>DANIEL CAROLINO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
     body{ font: 14px sans-serif;background-color:#FFFAFA }
        .title{text-align: center; margin-top:30px;}
        .container{ width: 850px; padding: 20px; margin-left:400px; margin-top: 50px;}
        h2,p{color: red}
        img{padding: 20px;width: 290px}
    </style>
</head>
<body>
    <h1 class="title"># LIVRARIA FATEC #</h1>
           <div class="container">
           <table>
            <tr>
            <td><img src="img\fatec.png" alt=""></td>

            <td> <h2>ACESSO DO PROFESSOR</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Acessar">
            </div>
        </form>
    </td>
        </tr>
</table>
    </div>
</div>
</body>
</html>