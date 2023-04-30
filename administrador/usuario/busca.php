<?php
  include '../../banco.php';
  //recebendo variáveis por post
  $texto = $_POST ['texto'];
  //criando uma consulta
  $sql = "select * from tbusu where email like '%$texto%' ";
  $consulta = $conexao -> query($sql);
  if($consulta){
    if ($consulta->num_rows > 0){
      while( $linha=$consulta->fetch_array(MYSQLI_ASSOC)){
          echo' <tr>
          <td>'.$linha['idusu'].'</td>
          <td>'.$linha['email'].'</td>
          <td>
              <a href="altusu.php?id='.$linha['idusu'].'" title="Alterar Usuário" class="btn btn-md btn-primary"> <i class="fa fa-edit"></i></a>
              <a href="../../deleteusu.php?id='.$linha['idusu'].'" title="Excluir Usuário" class="btn btn-md btn-danger"> <i class="fa fa-trash"></i></a>
          </td>
        </tr>';
      }
    } else {
      echo 'vazio';
    }
  }      
?>