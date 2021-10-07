var aktifSlaytNo = 1;  //İlk slayt, 1. olarak belirlenir
slaytlariGoster(aktifSlaytNo); //Ve slayt başlatılır
function slaytGoster(index) { 
  slaytlariGoster(aktifSlaytNo += index); //Slay göster fonksiyonu çağırılarak seçilen slayt gösterilir
}
function aktifSlayt(index) {
  slaytlariGoster(aktifSlaytNo = index); //Aktif slay bilgisi alınır
}
function slaytlariGoster(index) {
  var i;
  var slaytlar = document.getElementsByClassName("slide_div"); //Slayt resimleri alınır
  var noktalar = document.getElementsByClassName("nokta"); //Slayt noktaları alınır 
  if (index > slaytlar.length) {aktifSlaytNo = 1} //Slayt sona gelirse, en başa geri dönülür
  if (index < 1) {aktifSlaytNo = slaytlar.length} //Slayt başa gelirse, sonra atlanır
  for (i = 0; i < slaytlar.length; i++) { //Her resmin görünürlüğü kapatılır
      slaytlar[i].style.display = "none";
  }
  for (i = 0; i < noktalar.length; i++) { //Ardından her noktanın aktif olma özelliği kapatılır
      noktalar[i].className = noktalar[i].className.replace(" aktifslayt", "");
  } 
  slaytlar[aktifSlaytNo-1].style.display = "block"; //Aktif olan slayt'ın resmi görünür hale gelir
  noktalar[aktifSlaytNo-1].className += " aktifslayt"; //Aktif olan slayt noktasının sınıfına aktifslayt sınıfı eklenir
}