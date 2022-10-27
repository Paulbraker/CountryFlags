<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>php tanulás</title>
</head>
<body>
    <?php
    session_start();
    
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!--<form action="bin/demo.php" method="post">
                    <input type="checkbox" name="Cb1" id="Cb1" value="on">
                    <input type="submit" value="Query">
                </form>-->
                <h2>
                    Üdv a zászlókvízben! A játék folyamán 3 zászlóból kell kitalálnod a helyes megoldást. A játék 5 körből áll.
                </h2>
                <!--<form action="bin/generatecountries.php" method="GET" target=""> Loading page requires JQuery for ajax.load() function
                    
                    <input type="submit" value="Játék indítása" name="submit">

                </form>-->
                <a href="bin/generatecountries.php?newgame=true" class="btn btn-primary">Játék indítása</a>
            

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>