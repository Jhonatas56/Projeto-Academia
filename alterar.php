<?php
    include 'banco.php';

    //Testando se a variável "alt" chega por GET
    if(isset($_GET['alt'])){

        //Testando o valor da variável "alt" para fazer o update na tabela correspondente

        //Usuário
        if($_GET['alt']=='usuario'){
            $id = $_POST['id'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $cargo = $_POST['cargo'];
         

            $sql = "update tbusu set email='$email', senha='$senha', cargo='$cargo' where idusu='$id'";

            $update = $conexao->query($sql);

            if ($update) {
                header('Location: administrador/usuario/buscausu.php?update=ok');
            } else {
                header('Location: buscausu.php?update=erro');
            }
        }
    }

 

    //Testando se a variável "alt" chega por GET
    if(isset($_GET['alt'])){

        //Testando o valor da variável "alt" para fazer o update na tabela correspondente

        //Usuário
        if($_GET['alt']=='aluno'){
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $sexo = $_POST['sexo'];
            $data_nasc = $_POST['data_nasc'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero_casa = $_POST['numero_casa'];

            $sql = "update tbaluno set nome='$nome', sexo='$sexo', data_nasc='$data_nasc', bairro='$bairro', rua='$rua', numero_casa=' $numero_casa' where idaluno='$id'";

            $update = $conexao->query($sql);

            if ($update) {
                header('Location: administrador/aluno/buscaaluno.php?update=ok');
            } else {
                header('Location: administrador/aluno/buscaaluno.php?update=erro');
            }
        }
    }

    
?>