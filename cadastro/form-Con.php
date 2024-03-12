<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT Nome, codconf, idade, mesa FROM Convidados ORDER BY Nome ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convidados</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Cadastro de convidados</p>
        </div>
        <form action="add-Con.php" method="post">
            <div class="form-group">
                <label for="Nome">Nome: </label>
                <input type="text" class="form-control" name="Nome" id="name" required minlength="5" placeholder="Informe o nome do convidado">
            </div>
            <div class="form-group">
                <label for="Nome">Mesa: </label>
                <input type="number" class="form-control" name="mesa" id="mesa" required minlength="1" placeholder="mesa">
            </div>
    
            <div class="form-group">
                <label for="selectidade">Informe a idade dele</label>
                <input type="number" class="form-control" name="idade" id="idade" placeholder="numeros apenas">

                  <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['codconf'] ?> "> <?php echo $dados[''] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
              </div>
              <div class="form-group">
    
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>
    </div>
    <div class="container">
        <div class="card-footer">
        </div>
    </div>
</body>
</html>