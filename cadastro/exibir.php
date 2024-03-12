<?php
    require '../init.php';
    $PDO = db_connect();


    $idade = "S";
    $sql = "SELECT Ta.codconf	, Ta.mesa, Ti.via FROM Convidados as Ta inner join Confirmacao as Ti on Ta.Nome = Ti.Nome where Ta.idade = :idade";

    // SELECT Ta.codconf, Ta.mesa, Ti.mesa FROM Convidados as Ta inner join Confirmacao as Ti on Ta.tipo_codconf = Ti.codconf where Ta.idade = "N"
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':idade', $idade);
    $stmt-> execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wcodconfth=device-wcodconfth, initial-scale=1.0">
    <title>Convidados</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
            });
        });
    </script>
</head>
<body>
    <div class="container">
            <div codconf="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
                <p class="h3 text-center">Convidados cadastrados</p>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">idade</th>
                <th scope="col">Mesa</th>
            </tr>
        </thead>
        <tbody>
            
            <?php while ($cadastro = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row"><?php echo $cadastro['codconf'] ?></th>
                    <td><?php echo $cadastro['mesa'] ?></td>
                    <td><?php echo $cadastro['mesa'] ?></td>
                    <td>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    <div class="container">
        <div class="card-footer">
        </div>
    </div>
</body>
</html>