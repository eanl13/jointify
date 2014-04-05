<?php

include_once './connection.php';

//bu sayfaya etkinlik id ile gelinmesi gerekir.
if(!isset($_GET['etkinlik_id'])){
    header("Location: etkinlik.php");
    exit;
}

$sql = "SELECT * FROM etkinlik WHERE id=". $_GET['etkinlik_id'];
//db den kayıt çek
$sonuc = mysqli_query($con, $sql);

//db den çekilen kaydı dizi değişken olarak aktar.
$etkinlik = mysqli_fetch_array($sonuc);

$hata = null;

//form gönderildi ise
if(isset($_POST['btnSubmit'])){
    
    
    $dolu=null;
    //5 defa işlem yaptır.
    for($i=0; $i<5; $i++){
        $key = 'secenek'.($i+1);
        if(!empty($_POST[$key])){
            $dolu=true;
            $etkinlik_id = $etkinlik['id'];
            $etkinlik_secenek = $_POST[$key];
            $sql = "INSERT INTO etkinlik_secenek(etkinlik_id,secenek)VALUES('$etkinlik_id', '$etkinlik_secenek')";
            
            //yeni etkinlik seceneği için sql kodunu mysql sonucunda calıstırır.
            mysqli_query($con, $sql);
        }
    }
    
    //eğer dolu değişkeni null ise hiç bir secenek girilmemeiş demektir.
    if(is_null($dolu)){
       $hata = 'En az lütfen bir seçenek belirleyiniz.';
    }else{
        header("Location. zaman_secenekleri.php?etkinlik_id=$etkinlik_id");
        exit;
    }
    
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>"<?php echo $etkinlik['baslik'];  ?>"Etkinlik Seçenekleri</h1>
        
        <form method="POST">
            <?php
            if(!is_null($hata)){
                echo "<p style='color:red;'>$hata</p>";
            }
            
            ?>
            <br>
            Seçenek 1 : <input type="text" name="secenek1" value="" />
            
            <br>
            
            Seçenek 2 : <input type="text" name="secenek2" value="" />
            
            <br>
            
            Seçenek 3 : <input type="text" name="secenek3" value="" />
            
            <br>
            
            Seçenek 4 : <input type="text" name="secenek4" value="" />
            
            <br>
            
            Seçenek 5 : <input type="text" name="secenek5" value="" />
            
            <br>
            
            <input type="submit" value="İleri>>" name="btnSubmit" />
            
            
        </form>
        
    </body>
</html>
