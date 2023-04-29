<?php

$id = $_GET['id'];

include('banco.php');

$sql = "delete from tbaluno where idaluno = $id";

$delete = $conexao->query($sql);

if($delete == true){
    header('location: buscaaluno.php?delete=ok');
}else{
    header('location: buscaaluno.php?delete=erro');
}

?>