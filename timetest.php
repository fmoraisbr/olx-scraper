<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes</title>
</head>

<body>

    <script>
        alert('Please correct the errors in the form!');
    </script>

    <form class="form-inline d-flex justify-content-center" style="border-radius: 4px;" action="timetest.php" method="post" onSubmit="return confirm('Do you want to submit?') ">
        <div class="input-group">
            <input name="entrada" type="text" class="form-control" placeholder="Link do resultado" id="form1">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <?php

    $i = 1;
    while ($i <= 10) {
        echo $i++;  /* the printed value would be
                   $i before the increment
                   (post-increment) */
    }

    // while (1 === 1) {

    //     echo "<script>alert('Please correct the errors in the form!');</script>";

    //     sleep(5);
    // }

    // echo "<script type='javascript'>alert('Email enviado com Sucesso!');</script>";

    // while (1  === 1) {

    //     echo "<script type='javascript'>alert('Email enviado com Sucesso!');</script>";

    //     sleep(30);
    // }

    ?>


</body>

</html>