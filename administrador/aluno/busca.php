<?php
  include '../../banco.php';

  //recebendo variáveis por post
  $texto = $_POST ['texto'];

  //criando uma consulta
  $sql = "select * from tbaluno where nome like '%$texto%' ";
  $consulta = $conexao -> query($sql);

  if($consulta){
    if ($consulta->num_rows > 0){
      while(  $linha=$consulta->fetch_array(MYSQLI_ASSOC)){
        //coloca a data em formato brasileiro
        $data = implode("/", array_reverse(explode("-", $linha['data_nasc'])));
        echo' <tr>
              <td>'.$linha['nome'].'</td>
              <td>'.$linha['sexo'].'</td>
              <td>'.$data.'</td> 
              <td>'.$linha['bairro'].'</td>
              <td>'.$linha['rua'].'</td>
              <td>'.$linha['numero_casa'].'</td>
              <td>
                  <a href="altaluno.php?id='.$linha['idaluno'].'" title="Alterar Aluno" class="btn btn-md btn-primary"> <i class="fa fa-edit"></i></a>
                  <a href="../../deletealuno.php?id='.$linha['idaluno'].'" title="Excluir Aluno" class="btn btn-md btn-danger"> <i class="fa fa-trash"></i></a>
              </td>
              </tr>';
      }
    }else{
      echo 'vazio';    
    }
  }
?>