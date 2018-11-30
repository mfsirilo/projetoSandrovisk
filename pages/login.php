<!DOCTYPE html>
<html>
    <head>
        <title>Biblioteca</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header text-center text-warning">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="E-mail">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="senha" placeholder="Senha">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Login" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST['email'])) {
                include("./fixed/conexao.php");
                $sql = "select * from usuario where email=".$_POST['email']." and senha=".$_POST['senha']." limit 1";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0) {
                    session_start();
                    $row = mysqli_fetch_array($result);
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION['id'] = $row['idusuario'];
                    $_SESSION['tipo'] = $row['tipo'];
                    if($_SESSION['tipo'] == "ADM") {
                        header("location: admin.php");
                    } else {
                        header("location: user.php");
                    }
                }
            }
        ?>
    </body>
</html>