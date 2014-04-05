<?php

include_once './connection.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            Etkinlik adını girin:
            <br>
            <input type="text" name="baslik"/>
            <?php
            
            //eger hata degiskeni null degilse hata var demektir.
            if(!is_null($hata)){
                echo "<span style='color:red;'>$hata</span>";
            }
            
            ?>
            <br>
            <input type="submit" value="Ileri >>" name="btnSubmit"/>
                
        </form>
    </body>
</html>
