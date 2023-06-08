<?php
    include_once '../../banco.php';
    session_start();

    $sql = "SELECT tbexercicio.nome AS exercicio, tbitem_ficha.* 
    FROM tbitem_ficha
    INNER JOIN tbexercicio ON(tbexercicio.idexercicio = tbitem_ficha.idexercicio)
    WHERE tbitem_ficha.idficha = ".$_SESSION['idficha'];
    
    $consulta = $conexao -> query($sql);
    
    if($consulta){
      if($consulta -> num_rows > 0){
        while($linha = $consulta -> fetch_array(MYSQLI_ASSOC)){
            echo '<tr>
                    <td>'.$linha['exercicio'].'</td>
                    <td>'.$linha['serie'].'</td>
                    <td>'.$linha['repeticoes'].'</td>
                    <td>'.$linha['tipo_treino'].'</td>
                </tr>';
        }
      }
    }
?>