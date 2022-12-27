<?php
session_start();
include_once "conexao.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sis. Of Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);

    if(!empty($dados['sendLogin'])) {
 

    $query_usuario = "SELECT usuario, senha_usuario 
                        FROM usuarios 
                        WHERE usuario =:usuario  
                        LIMIT 1";
      $result_usuario = $conn->prepare($query_usuario);
      $result_usuario->bindParam(':usuario', $dados['usuario']);
      $result_usuario->execute();
      
      if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
       $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC); //pegando dados do BD

       
       if(($dados['senha_usuario'] == $row_usuario['senha_usuario'])){
             header("Location: painel.html");      
       }
       else {
        echo "<p style='color: red'>Usuário ou senha inválida!!</p>";
       } } 
       else {
        echo "<p style='color: red'>Usuário ou senha inválida!!</p>";
       }

      

    }

    
    ?>
    
    <form method="POST" action="">
        <div class="form-group">
        <label>usuario</label>
        <input type="text" name="usuario" placeholder="digite o usuário" required><br><br>
</div>
        <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="digite a senha" required><br><br>
        <input type="submit" value="acessar" name="sendLogin">
</div>
</form>


</body>
</html>