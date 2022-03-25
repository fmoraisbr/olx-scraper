<?php

$content = file_get_contents('https://df.olx.com.br/distrito-federal-e-regiao/brasilia/ra-xix---candangolandia/imoveis/aluguel?pe=1500&roe=3&ros=2&sf=1');

preg_match_all('/<span color="dark" aria-label="(.*?)" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/s', $content, $matchesx);
preg_match_all('/<span color="dark" class="wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb" font-weight="400">(.*?)<\/span>/s', $content, $matchesy);
preg_match_all('/<div class="aoie8y-0 hRScWw">(.*?)<\/div>/s', $content, $matchesz);

echo "<br>";

$numeros = array("0","1","2","3","4");

foreach ($numeros as $key => $value){
    echo "<h2>".$matchesx[0][$value]." às ";
    echo $matchesy[0][$value]."<br/>";
    echo $matchesz[0][$value]."<br/></h2>";
}










//preg_match_all('/<div class="wlwg1t-0 hWBHAm">(.*?)<\/div>/s', $content, $matches);
//preg_match_all('/<div class="fnmrjs-7 erUydy">(.*?)<\/div>/s', $content, $matches); //wlwg1t-1 fsgKJO sc-ifAKCX eLPYJb

//var_dump($matches);

/*echo $matchesx[0][0];
echo "<br/>";
echo $matchesy[0][0];
echo "<br/>";
echo $matchesz[0][0];

echo "<br><hr><br>";

echo $matchesx[0][1];
echo "<br/>";
echo $matchesy[0][1];
echo "<br/>";
echo $matchesz[0][1];

echo "<br><hr><br>";

echo $matchesx[0][2];

echo "<br><hr><br>";

echo $matchesx[0][3];

echo "<br><hr><br>";

echo $matchesx[0][4];

echo "<br><hr><br>";*/

/*echo "<hr><br>";

print_r($matchesx);

echo "<br><br><hr><br>";

var_dump($matchesx);*/

?>