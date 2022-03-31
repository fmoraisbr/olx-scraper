<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes</title>
</head>

<body>

    <form class="form-inline d-flex justify-content-center" style="border-radius: 4px;" action="zaptest.php" method="post">
        <div class="input-group">
            <input name="entrada" type="text" class="form-control" placeholder="Link do resultado" id="form1">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <?php

    function send_whatsapp($message = "Test")
    {

        $phone = "+556186535340";  // Enter your phone number here
        $apikey = "288162";       // Enter your personal apikey received in step 3 above

        $url = 'https://api.callmebot.com/whatsapp.php?source=php&phone=' . $phone . '&text=' . urlencode($message) . '&apikey=' . $apikey;

        if ($ch = curl_init($url)) {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $html = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo "Output:".$html;  // you can print the output for troubleshooting
            curl_close($ch);
            return (int) $status;
        } else {
            return false;
        }
    }

    if (isset($_POST['entrada'])) {

        $result = $_POST['entrada'];

        send_whatsapp($result);
        // send_whatsapp("Código do anúncio: AP00456");

        echo "<h1>" . $result . "</h1>";
    }

<<<<<<< HEAD
    $cont3 = 1;

    if ($cont3 === 1) {
        send_whatsapp("Código do anúncio: AP00456");
    }

    // send_whatsapp("Código do anúncio: AP00456");


=======
>>>>>>> parent of 4f048b1 (Alteração)
    ?>

</body>

</html>