<!DOCTYPE html>
<html lang="en">

<?php
$vt = mysqli_connect("localhost","root",""); //Veritabanı bağlantısını sağlar
$vt->query("CREATE DATABASE IF NOT EXISTS E_Ticaret_Veritabani"); //Veritabanı yoksa oluşturur
$vt->query("USE E_Ticaret_Veritabani"); //Veritabanını kullanır
$vt->query("CREATE TABLE IF NOT EXISTS Sepet(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Urun_Adi VARCHAR(50),
    Fiyat REAL
)"); //Sepet adında tablo, yok ise oluşturur
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sepet</title>
</head>

<body>
    <nav>
        <a href="index.html" class="logo">LOGO</a>
        <div class="actions">
            <a href="#">Giriş Yap</a>
            <a href="#">Kayıt Ol</a>
        </div>
    </nav>


    <div class="product-detail-container">
        <div class="menu">
            <a href="index.html">Anasayfa</a>
            <a href="hakkimizda.html">Hakkımızda</a>
            <a href="contact.html">İletişim</a>
            <a href="Sepet.php">Sepet</a>
        </div>
        <div style="width: 50%;" >
        <h1>Sepetiniz</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                </tr>
            </thead>
            <?php
            $sorgu = $vt->query("SELECT SUM(Fiyat) as toplam FROM Sepet"); //Sepet tablosundan ücretlerin toplamı alınır
            $toplam = $sorgu->fetch_assoc()['toplam']; //Toplam değişkenine aktarılır
            $sorgu = $vt->query("SELECT * FROM Sepet"); //Sepetteki tüm satırlar alınır
            while ($satir = $sorgu->fetch_assoc()) { //Sepetteki her bir veri tabloda satır olarak listelenir
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $satir['Urun_Adi']; ?></td>
                        <td>1</td>
                        <td><?php echo $satir['Fiyat']; ?>₺</td>
                    </tr>
                </tbody>
            <?php
            }

            ?>
            <tr>
                <!--En son genel toplam yazdırılır-->
                <td colspan="2" scope="row">Genel Toplam:
                </td>
                <td>
                    <?php echo $toplam."₺";?>
                </td>
            </tr>
        </table>
        <a href="satinal.php?SepetiBosalt=1" class="satin-al">Sepeti Boşalt</a>
        </div>
    </div>


    </div>

    <footer style="margin-top: 240px;">
        <a href="index.html">Anasayfa</a>
        <a href="hakkimizda.html">Hakkımızda</a>
        <a href="contact.html">İletişim</a>
            <a href="Sepet.php">Sepet</a>
    </footer>
</body>

</html>