<?php

$id = $_GET['id'];

include('banco.php');

$sql = "delete from tbusu where idusu = $id";

$delete = $conexao->query($sql);

if($delete == true){
    header('location: admin.php?delete=ok');
}else{
    header('location: admin.php?delete=erro');
}

?>