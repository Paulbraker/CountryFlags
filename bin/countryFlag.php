<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Országok Demo</title>
</head>

        <?php
        session_start();
        $_SESSION['enter']=true;
        
        if (isset($_GET['reload']) && $_GET['reload']==true) {
            header("Location: generateCountries.php",TRUE,301);
        }

        
        

        
        if(isset($_GET['input']) &&  $_GET['input'] =='true'){
            $_SESSION['enter']=false;
            //header("Location: generateCountries.php",TRUE,301);
            
            if ($_SESSION['correctflag'][0]->ccn3==$_SESSION['imglinks'][$_GET['cCountry']][0]->ccn3){
                    
                    print('<span class="text-success"><h1>Jó válasz!</h1></span> <br>');
                    $_SESSION['correct']++;
                    $_SESSION['ans'][] = $_SESSION['imglinks'][$_GET['cCountry']][0]->ccn3;
                    $_SESSION['cAns'][] = $_SESSION['correctflag'][0]->ccn3;
                    if ($_SESSION['correct']+$_SESSION['wrong']!=5) {
                        print('<h1><a class="btn btn-success" href="?reload=true">Következő</a></h1>');
                    }      
            }
            else {
                print('<span class="text-danger"><h1>Nem jó válasz!</h1></span> <br>');
                $_SESSION['wrong']++;
                $_SESSION['ans'][] = $_SESSION['imglinks'][$_GET['cCountry']][0]->ccn3;
                $_SESSION['cAns'][] = $_SESSION['correctflag'][0]->ccn3;
                if ($_SESSION['correct']+$_SESSION['wrong']!=5) {
                    print('<h1><a class="btn btn-success" href="?reload=true">Következő</a></h1>');
                } 
            }
    
            // TODO: El kell menteni a válaszokat (DONE)
        } 
        
        
        if (isset($_SESSION['correct'])&&isset($_SESSION['wrong'])) {
            $correctnum = $_SESSION['correct'];
            $wrongnum = $_SESSION['wrong'];
            print('<p class="fixPos" id="a">Válaszok száma: '.$correctnum+$wrongnum.'</p>');
            print('<span class="text-success fixPos" id="b">
                <p>Jó válaszok: '.$correctnum .'</p></span>');
            print('<span class="text-danger fixPos" id="c"><p>Rossz válaszok: '.$wrongnum .'</p></span>');
        if(isset($_SESSION['imglinks'])&&isset($_SESSION['correctflag'])&&$_SESSION['enter']==true&&($correctnum+$wrongnum)<5)
        {

            print('<h1>Melyik a következő ország zászlaja? <br>'.$_SESSION['correctflag'][0]->translations->hun->common.'</h1>');
            
            for ($i=0; $i < 3; $i++) { 

                $response = $_SESSION['imglinks'][$i];

                

                print('<a href="?input=true&cCountry='.$i.'"><img src="'.$response[0]->flags->png.'" alt=""></a> <br>');

            }
            
        }
        if ($correctnum+$wrongnum==5) {
            // End Of Game
            print('<h1><a href="generatecountries.php?newgame=true&clearAns=true" class="btn btn-primary" >Következő játék</a></h1> <br>');
            print('<h1>Válaszok: </h1><br>');
            for ($i=0; $i < count($_SESSION['ans']); $i++) { 
                $deCoderCAns = json_decode(file_get_contents('https://restcountries.com/v3.1/alpha/'.$_SESSION['ans'][$i]));
                $deCoderAns = json_decode(file_get_contents('https://restcountries.com/v3.1/alpha/'.$_SESSION['cAns'][$i]));
                print('<h2>'.$deCoderCAns[0]->translations->hun->common.': ');
                print('('.'<img src="'.$deCoderAns[0]->flags->png.'" class="kiskep" alt="">'.') </h2>');
                //print(json_decode(file_get_contents($_SESSION['ans'][$i]))[0]->ccn3.' ');
                if ($_SESSION['cAns'][$i]==$_SESSION['ans'][$i]){
                    print('<h2><span class="text-success">Jó válasz</span></h2><br><br>');
                }
                else{
                    print('<h2><span class="text-danger">Rossz válasz,</span> jó válasz: <img src="'.$deCoderCAns[0]->flags->png.'" class="kiskep" alt=""></h2><br><br>');
                    
                }
            }
            
        }
    }
    
        ?>
        
<body>
    <script src="../Js/countOfCorrect.js">
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

