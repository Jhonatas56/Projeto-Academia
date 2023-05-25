<?php
  include 'banco.php';

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "select * from tbusu where email='$email' and senha='$senha'";

  $consulta = $conexao -> query($sql);

  if($consulta){
    if($consulta -> num_rows > 0){
      session_start();
      $_SESSION['login'] = 'ok';
      $linha = $consulta -> fetch_array(MYSQLI_ASSOC);
      
      //Testa o cargo para ver se é um gerente, educador físico ou aluno
      if($linha['cargo'] == 'G'){
        header('Location: ../admin.php');
      }
      
      if($linha['cargo'] == 'E'){
        header('Location: ../educador.php');
      }
      
      if($linha['cargo'] == 'A'){
        $_SESSION['aluno'] == $linha['idusu'];
        header('Location: ../aluno.php');
      }

    }
    else {
      header('Location: ../index.php?login=erro'); 
    }
  }
?>