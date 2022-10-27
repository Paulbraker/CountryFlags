<?php
if(isset($_POST['Cb1'])){
    print "AAAAAAAAAAAAA";
}
else{
    header('Location: ../index.php', true, 301);
    exit();
    
}


?>