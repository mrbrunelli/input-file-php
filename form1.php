<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <form class="container" name="form1" action="ex1.php" method="post" enctype="multipart/form-data">
        <h1>Formulário</h1>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" class="form-control" required>

        <label for="arquivo">Arquivo</label>
        <input type="file" name="arquivo" class="form-control" required accept=".jpg, .jpeg, .png">

        <button class="btn btn-success" type="submit">Enviar dados</button>
    </form>

    <h2>Imagens cadastradas</h2>

    <div class="row">
        <?php
        include 'conexao.php';

        $sql = 'select descricao, arquivo from arquivos';

        $consulta = $pdo->prepare($sql);

        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            //separar os dados
            $descricao = $dados->descricao;
            $arquivo = $dados->arquivo;

            $arquivog = 'arquivos/' . $arquivo . 'g.jpg';
            $arquivop = 'arquivos/' . $arquivo . 'p.jpg';

            echo '
                <div class="col-4">
                    <a href="' . $arquivog . '">
                        <img src="' . $arquivop . '" class="w-100" title="' . $descricao . '">
                    </a>
                </div>
            ';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>