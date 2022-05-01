<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Scraping OLX - Aluguéis Candangolândia</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Navigation-->

    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">OLX Scraper</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Login</a></li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- Masthead-->
    <header class="masthead">

        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <img src="https://logodownload.org/wp-content/uploads/2016/10/olx-logo-13.png" class="rounded" style="max-width: 50%;">
                    <!-- <h1 class="text-white font-weight-bold">OLX</h1> -->
                    <hr class="divider" />
                </div>

                <div class="col-lg-8 align-self-baseline">
                    <!-- <p class="text-white-75 mb-5">
                        https://df.olx.com.br/distrito-federal-e-regiao/brasilia/ra-xix---candangolandia/imoveis/aluguel?pe=1500&roe=3&ros=2&sf=1
                    </p> -->

                    <div class="container">
                        <div class="row">
                            <div class="mx-auto col">
                                <form action="" method="post" class="form-inline d-flex justify-content-center" style="border-radius: 4px;">
                                    <div class="input-group">
                                        <input name="entrada" type="text" class="form-control" placeholder="Link do resultado" id="form1">
                                        <div class="input-group-append">  
                                            <button class="btn btn-primary" type="submit">Pesquisar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">

                            <?php

                            if (isset($_POST['entrada'])) {

                                $result = $_POST['entrada'];
                                $write = file_put_contents("data.txt", $result);
                            }

                            $info = file_get_contents("data.txt");

                            echo "<p><h6 style=\"color: white; font-size: 12px;\">" . $info . "</h6></p>";

                            ?>

                        </div>
                    </div>

                    <!-- class="text-white-75 mb-5" -->

                    <?php

                    $content = file_get_contents($info);
                    // $content = file_get_contents('https://df.olx.com.br/distrito-federal-e-regiao/brasilia/ra-xix---candangolandia/imoveis/aluguel?pe=1500&roe=3&ros=2&sf=1');

                    preg_match_all('/<span aria-label="Anúncio publicado em: (.*?)" class="sc-11h4wdr-0 cHSTFT sc-ifAKCX cmFKIN" color="dark" font-weight="400">(.*?)<\/span>/s', $content, $matchesx);
                    /* preg_match_all('/<span color="dark" aria-label="(.*?)" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/s', $content, $matchesx); */
                    /* <span aria-label="Anúncio publicado em: Hoje, 13:36." class="sc-11h4wdr-0 cHSTFT sc-ifAKCX cmFKIN" color="dark" font-weight="400">Hoje, 13:36</span> */

                    preg_match_all('/<span color="dark" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/s', $content, $matchesy);
                    // preg_match_all('/<div class="aoie8y-0 hRScWw">(.*?)<\/div>/s', $content, $matchesz);

                    preg_match_all('/class="m7nrfa-0 cjhQnm sc-ifAKCX kaNiaQ" color="dark" font-weight="400">(.*?)<\/span>/', $content, $matchesz);
                    //preg_match_all('/class="sc-ifAKCX eoKYee">(.*?)<\/span>/', $content, $matchesz);
                    /* class="sc-ifAKCX eoKYee">R$ 1.300</span> */

                    preg_match_all('/<span color="dark" title="(.*)" class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchest);
                    // preg_match_all('/<a data-lurker-detail="list_id" data-lurker_list_id="(.*?)" data-lurker_is_featured="0" data-lurker_last_bump_age_secs="0" data-lurker_list_position="0" data-lurker_vehicle_report_enabled="false" href="(.*)" target="_blank" title="(.*)" class="fnmrjs-0 fyjObc">/', $content, $matchesk);
                    preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk);
                    preg_match_all('/data-lurker_vehicle_report_enabled="false" href="(.*?)"/', $content, $matchesd);

                    preg_match_all('/class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchesn);

                    preg_match_all('/<div aria-label="(.*?)" class="sc-1ftm7qz-2 ilPFvN"><span title="(.*?)" aria-label="(.*?)" class="sc-1ftm7qz-0 itsfPe sc-ifAKCX cmFKIN" color="dark" font-weight="400">(.*?)<\/span>/', $content, $matchesw);
                    /* preg_match_all('/class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchesw); */
                    /* <span title="2 quartos" aria-label="2 quartos." class="sc-1ftm7qz-0 itsfPe sc-ifAKCX cmFKIN" color="dark" font-weight="400">2 quartos</span> */
                    // preg_match_all('/class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">3 quartos | 1 vaga<\/span>/', $content, $matchesw);

                    echo "<br>";

                    $numeros = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");

                    // echo "<h1>" . preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk) . "</h1>";

                    $contador = preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk);
                    $loop = range(0, $contador - 1);


                    // echo "<h1 style=\"color: white; font-size: 11px; text-align: left;\">" . var_dump($matchesn[0][0]) . "</h1>";

                    // foreach ($loop as $key => $value) {
                    //     echo $value;
                    // }

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

                    ?>

                    <p>
                        <?php
                        date_default_timezone_set('America/Sao_Paulo');
                        echo "<h5 style=\"color: white; font-size: 11px; text-align: left;\">Total: " . $contador . " resultados<br/><span style=\"font-style: italic; font-size: 0.70em;\">Update: " . date('d/m/Y H:i', time()) . "</span></h5>";
                        ?>
                    </p>

                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>

                    <table class="table branco">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Dia/hora</th>
                                <!-- <th scope="col">Hora</th> -->
                                <th scope="col">Opções</th>
                                <th scope="col">Preço</th>
                                <th scope="col">ID Anúncio ⤵️</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php



                            foreach ($loop as $key => $value) {

                                echo "<tr>";

                                /* [1] ------------------------ [START] Contador */

                                echo "<th scope=\"row\">" . ($value + 1) . "</th>";

                                /* [1] ------------------------ [END] Contador */

                                /* [2] ------------------------ [START] Dia */

                                $captura3 = $matchesx[1][$value];
                                //$link3 = substr($captura3, 23, 200);
                                $aspaslink3 = str_replace('.', '', $captura3);

                                echo "<td>" . $aspaslink3 . "</td>"; // echo "<td>" . $matchesx[0][$value] . "</td>";

                                /* [2] ------------------------ [END] Dia */

                                /* [3] ------------------------ [START] Hora */

                                $captura4 = $matchesy[0][$value];
                                $link4 = substr($captura4, 119, 200);
                                $aspaslink4 = str_replace('</span>', '', $link4); // echo "<td>" . $matchesy[0][$value] . "</td>";

                                //echo "<td>" . $captura4 . "</td>";

                                /* [3] ------------------------ [END] Hora */

                                /* [4] ------------------------ [START] Opções */

                                $captura5 = $matchesw[0][$value];
                                $link5 = substr($captura5, 202, 2);
                                //$aspaslink5 = str_replace('</span>', '', $link5); // echo "<td>" . $matchesy[0][$value] . "</td>";

                                //$aspaslink6 = str_replace(' quartos', '', $link5); // echo "<td>" . $matchesy[0][$value] . "</td>";
                                //$integer2 = (int) filter_var($aspaslink6, FILTER_SANITIZE_NUMBER_INT);

                                $nquartos = (int) filter_var($link5, FILTER_SANITIZE_NUMBER_INT);

                                //echo "<td>" . $nquartos . "</td>";


                                if ($nquartos >= 3) {
                                    echo "<td style=\"color: aqua;\">" . $nquartos . " quartos</td>";
                                } else {
                                    echo "<td>" . $nquartos . " quartos</td>";
                                }


                                /* [4] ------------------------ [END] Opções */

                                /* [4] ------------------------ [START] Valor em R$ */

                                $valorimovel = $matchesz[0][$value];
                                $valorimovelsub = substr($valorimovel, 74, 10);

                                $valorfloat = (float) filter_var($valorimovelsub, FILTER_SANITIZE_NUMBER_INT);

                                if ($valorfloat > 1300) {
                                    echo "<td style=\"color: red;\">R$ " . number_format($valorfloat, 0, ',', '.') . "</td>";
                                } else {
                                    echo "<td style=\"color: lawngreen;\">R$ " . number_format($valorfloat, 0, ',', '.') . "</td>";
                                }

                                /*if ($valorfloat > 1300) {
                                    if (empty($valorfloat)) {
                                        echo "<td style=\"color: white;\">R$ 0,00</td>";
                                    }
                                    if (isset($valorfloat)) {
                                        echo "<td style=\"color: red;\">R$ " . number_format($valorfloat, 2, ',', '.') . "</td>";
                                    }
                                }
                                if ($valorfloat < 1300) { //lawngreen
                                    if (empty($valorfloat)) {
                                        echo "<td style=\"color: white;\">R$ 0,00</td>";
                                    }
                                    if (isset($valorfloat)) {
                                        echo "<td style=\"color: lawngreen;\">R$ " . number_format($valorfloat, 2, ',', '.') . "</td>";
                                    }
                                }*/

                                /*$variable1 = $matchesz[0][$value];
                                $integer1 = (float) filter_var($variable1, FILTER_SANITIZE_NUMBER_INT);
                                $verificarint = ($integer1 * (-1));

                                if (($integer1 * (-1)) > 1300) {
                                    if (empty($verificarint)) {
                                        echo "<td style=\"color: white;\">R$ 0,00</td>";
                                    }
                                    if (isset($verificarint)) {
                                        echo "<td style=\"color: red;\">R$ " . $verificarint . "</td>";
                                    }
                                }
                                if (($integer1 * (-1)) < 1300) { //lawngreen
                                    if (empty($verificarint)) {
                                        echo "<td style=\"color: white;\">R$ 0,00</td>";
                                    }
                                    if (isset($verificarint)) {
                                        echo "<td style=\"color: lawngreen;\">R$ " . $verificarint . "</td>";
                                    }
                                }*/

                                /* [4] ------------------------ [END] Valor em R$ */

                                /* [5] ------------------------ [START] Link ID Anúncio */

                                $variable2 = $matchesk[0][$value];
                                $integer2 = (int) filter_var($variable2, FILTER_SANITIZE_NUMBER_INT);

                                $captura = $matchesd[0][$value];
                                $link = substr($captura, 49, 200);
                                $aspaslink = str_replace('"', '', $link);

                                echo "<td><a href=\"" . $aspaslink . "\" target=\"_blank\">" . ($integer2 * (-1)) . "</a></td>";

                                /* [5] ------------------------ [END] Link ID Anúncio */

                                echo "</tr>";

                                $resultadohoje = str_replace('.', '', $matchesx[1][$value]);
                                $contadorhoje = substr($resultadohoje, 0, 4);

                                //echo "<br/><h1 style=\"color: lawngreen;\">" . $contadorhoje . "</h1>";


                                if ($contadorhoje === "Hoje") {
                                    $mensagem = "Alerta de Aluguel ⤵️\n\n"
                                        . $aspaslink;
                                    send_whatsapp($mensagem);
                                }
                            }

                            $resultadohoje = str_replace('.', '', $matchesx[1][$value]);
                            $contadorhoje = substr($resultadohoje, 0, 4);

                            if ($contadorhoje === "Hoje") {
                                $mensagem = "Update: " . date('d/m/Y H:i', time());
                                send_whatsapp($mensagem);
                            }

                            //echo "<h1>" . $link3 . "</h1>";

                            /*$timezap = "Últimos 3 Aluguéis 🕑\n\n_Update: " . date('d/m/Y H:i', time()) . "_\n";
                            send_whatsapp($timezap);

                            $contmsg = array(1, 2, 3);
                            foreach ($contmsg as $valor) {
                                $timezap2 = $aspaslink . "\n";
                                send_whatsapp($timezap2);
                            }*/

                            /*$timezap = "Aluguéis OLX 🕑\n\n_Update: " . date('d/m/Y H:i', time()) . "_";
                            send_whatsapp($timezap);*/

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer-->

    <!-- <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2022 - Felipe Morais</div>
        </div>
    </footer> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>