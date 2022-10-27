<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Betöltés</title>
</head>
<body>
    
<?php
/*print('<h1>Játék töltése folyamatban... Zászlók generálása</h1>
    
<img src="https://c.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif" alt="Loading image">'); 

Loading page requires JQuery for ajax.load()
*/


session_start();
if (isset($_GET['newgame'])&&$_GET['newgame']==true) {
    $_SESSION['correct'] = 0;
    $_SESSION['wrong'] = 0;
    unset($_SESSION['ans']);
    unset($_SESSION['cAns']);
}

$f_contents = file(dirname(__DIR__)."\assets\Country.txt"); //
        $_SESSION['imglinks'] = array();
        $_SESSION['correctFlag'];
        $_SESSION['correctflag'] = random_int(0,2);
        //print($_SESSION['correctflag'] ); DEBUG
        for ($i=0; $i < 3; $i++) { 
            $line = $f_contents[rand(0, count($f_contents) - 1)];
            $link = 'https://restcountries.com/v3.1/alpha/'.substr($line,0,3);
            
            $_SESSION['imglinks'][$i] = json_decode(file_get_contents($link));
            //print($_SESSION['imglinks'][$i]); //DEBUG
            if ($_SESSION['correctflag'] == $i) {
                $_SESSION['correctflag'] = json_decode(file_get_contents($link));
            }
        }
        
    

    header("Location: countryFlag.php",TRUE,301);
    
?>
</body>
</html>

