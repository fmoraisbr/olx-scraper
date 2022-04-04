<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes</title>
</head>

<body>

    <form class="form-inline d-flex justify-content-center" style="border-radius: 4px;" action="tests.php" method="post">
        <div class="input-group">
            <input name="entrada" type="text" class="form-control" placeholder="Link do resultado" id="form1">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <?php

    if (isset($_POST['entrada'])) {

        $result = $_POST['entrada'];
        $write = file_put_contents("data.txt", $result);
    }

    $info = file_get_contents("data.txt");

    echo "<h1>" . $info . "</h1>";

    $var1 = "<h1> Olá \"fulano de tal\" </h1>";
    echo str_replace('"', '', $var1);

    echo "A hora agora é " . date('D');

    ?>
</body>

</html>