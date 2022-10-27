


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Országok Demo</title>
</head>
        <?php
        // USED TO GENERATE  COUNTRY.TXT
         $myfile = fopen('Country.txt', 'w');
        
         $response = file_get_contents('https://restcountries.com/v3.1/all/');
         $response = json_decode($response);
         foreach($response as $i){
            fwrite($myfile, $i->ccn3."\n");



        }
            
        fclose($myfile);
        ?>
<body>
    
</body>
</html>

