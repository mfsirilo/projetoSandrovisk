<?php
    if(!isset($_GET['id'])){
        header("location: cadastroCliente.php");    
    }else{
        include("./fixed/conexao.php");
        $sql = "delete from cliente where idClientes = ".$_GET['id']."";
        mysqli_query($con,$sql);
        echo("<script type='text/javascript'>alert('Removido!')</script>");
        header("location: cadastroCliente.php");
    }
?>