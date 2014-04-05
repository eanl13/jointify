<?php

// Create connection
$con=mysqli_connect("localhost","root","","jointify");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $hata=null;
if(isset($_POST['btnSubmit'])){
    //baslik metin kutusundan değer geldi mi?
    if(!empty($_POST['baslik'])){
        $baslik=$_POST['baslik'];
        $sql = "INSERT INTO etkinlik(baslik) VALUES('$baslik')";
        
        //veritabanına kayıt ekle,
        mysqli_query($con, $sql);
        
        $etkinlik_id = mysqli_insert_id($con);
        
        header("Location: etkinlik_secenekleri.php?etkinlik_id=$etkinlik_id");
        exit;
        
    }else{
        $hata = 'Lütfen başlık giriniz';
    }
}
