<?php
$vt = mysqli_connect("localhost","root",""); //Veritabanı bağlantısını sağlar
$vt->query("CREATE DATABASE IF NOT EXISTS E_Ticaret_Veritabani"); //Veritabanı yoksa oluşturur
$vt->query("USE E_Ticaret_Veritabani"); //Veritabanını kullanır
$vt->query("CREATE TABLE IF NOT EXISTS Sepet(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Urun_Adi VARCHAR(50),
    Fiyat REAL
)"); //Sepet adında tablo, yok ise oluşturur
if(isset($_POST['satinal'])){ //Satın al düğmesine basılırsa
    $ad = $_POST['urunadi']; 
    $fiyat = $_POST['fiyat']; //Ürün adı ve fiyat bilgisi alınır
    $vt->query("INSERT INTO Sepet VALUES(NULL,'$ad',$fiyat)"); //Veritabanına kaydedilir
    header("Location:Sepet.php"); //Sepet sayfasına yönlendirilir
}
if(isset($_GET['SepetiBosalt'])) //Sepeti boşalt'a tıklanırsa
{
    $vt->query("DELETE FROM Sepet"); //Sepet tablosundaki tüm satırlar silinir
    header("Location:index.html"); //Anasayfaya yönlendirilir
}
