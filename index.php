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

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">OLX Scraper</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <!-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#contact">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

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

                    preg_match_all('/>.....<\/span>/', $content, $matchesx);
                    // preg_match_all('/<span color="dark" aria-label="(.*?)" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchesx);
                    preg_match_all('/<span color="dark" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/s', $content, $matchesy);
                    // preg_match_all('/<div class="aoie8y-0 hRScWw">(.*?)<\/div>/s', $content, $matchesz);
                    preg_match_all('/class="sc-ifAKCX eoKYee">(.*?)<\/span>/', $content, $matchesz);
                    preg_match_all('/<span color="dark" title="(.*)" class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchest);
                    // preg_match_all('/<a data-lurker-detail="list_id" data-lurker_list_id="(.*?)" data-lurker_is_featured="0" data-lurker_last_bump_age_secs="0" data-lurker_list_position="0" data-lurker_vehicle_report_enabled="false" href="(.*)" target="_blank" title="(.*)" class="fnmrjs-0 fyjObc">/', $content, $matchesk);
                    preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk);
                    preg_match_all('/data-lurker_vehicle_report_enabled="false" href="(.*?)"/', $content, $matchesd);

                    preg_match_all('/class="sc-1j5op1p-0 lnqdIU sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/', $content, $matchesn);

                    echo "<br>";

                    $numeros = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");



                    // echo "<h1>" . preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk) . "</h1>";

                    $contador = preg_match_all('/data-lurker_list_id="(.*?)"/', $content, $matchesk);
                    $loop = range(0, $contador - 1);


                    // echo "<h1 style=\"color: white; font-size: 11px; text-align: left;\">" . var_dump($matchesn[0][0]) . "</h1>";

                    // foreach ($loop as $key => $value) {
                    //     echo $value;
                    // }


                    ?>

                    <p>
                        <?php
                        echo "<h5 style=\"color: white; font-size: 11px; text-align: left;\">Total: " . $contador . " resultados</h5>";
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
                                <th scope="col">Dia</th>
                                <th scope="col">Hora</th>
                                <!-- <th scope="col">Opções</th> -->
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

                                $captura3 = $matchesx[0][$value];
                                $link3 = substr($captura3, 78, 200);
                                $aspaslink3 = str_replace('</span>', '', $link3);

                                echo "<td>" . $captura3 . "</td>"; // echo "<td>" . $matchesx[0][$value] . "</td>";

                                /* [2] ------------------------ [END] Dia */

                                /* [3] ------------------------ [START] Hora */

                                $captura4 = $matchesy[0][$value];
                                $link4 = substr($captura4, 78, 200);
                                $aspaslink4 = str_replace('</span>', '', $link4); // echo "<td>" . $matchesy[0][$value] . "</td>";

                                echo "<td>" . $aspaslink4 . "</td>";

                                /* [3] ------------------------ [END] Hora */

                                /* [4] ------------------------ [START] Valor em R$ */

                                $variable1 = $matchesz[0][$value];
                                $integer1 = (float) filter_var($variable1, FILTER_SANITIZE_NUMBER_INT);

                                if (($integer1 * (-1)) > 1300) {
                                    if (empty($integer1)) {
                                        if (isset($integer1)) {
                                            echo "<td style=\"color: white;\">NULL</td>";
                                        }
                                    } else {
                                        echo "<td style=\"color: red;\">R$ " . ($integer1 * (-1)) . "</td>";
                                    }
                                }
                                if (($integer1 * (-1)) < 1300) {
                                    if (empty($integer1)) {
                                        if (isset($integer1)) {
                                            echo "<td style=\"color: white;\">NULL</td>";
                                        }
                                    } else {
                                        echo "<td style=\"color: lawngreen;\">R$ " . ($integer1 * (-1)) . "</td>";
                                    }
                                }

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
                            }

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