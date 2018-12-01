<?php
    if(!isset($_GET['id'])){
        header("location: cadastroLivro.php");    
    }else{
        include("./fixed/conexao.php");
        $sql = "delete from livro where idLivro = ".$_GET['id']."";
        mysqli_query($con,$sql);
        echo("<script type='text/javascript'>alert('Removido!')</script>");
        header("location: cadastroLivro.php");
    }
?>