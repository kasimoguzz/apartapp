<?php
session_start();


function isLoggedIn() {
    return (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true);    
}

function isAdmin() {
    return (isLoggedIn() && isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin");    
}
function safe_html($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
function getDuyuru() {
    include "ayar.php";
    $query = "SELECT * from duyurular ";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getDuyuruTime() {
    include "ayar.php";
    $query = "SELECT DISTINCT yayinTarihi FROM duyurular;";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getDuyuruTarihleri() {
    include "ayar.php";
    $query = "SELECT DISTINCT yayinTarihi FROM duyurular";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}


function getDuyurularByYayinTarihi($yayinTarihi) {
    include "ayar.php";
    $query = "SELECT * FROM duyurular WHERE yayinTarihi = '$yayinTarihi'";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}


function getDuyuruById(int $id) {
    include "ayar.php";
    $query = "SELECT * from Duyurular WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getUserById(int $id) {
    include "ayar.php";
    $query = "SELECT * from kullanicilar WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getSikayetById(int $id) {
    include "ayar.php";
    $query = "SELECT * from sikayetler WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function createDuyuru(string $baslik, string $altBaslik,string $aciklama, string $resim,string $olusturulma_tarihi) {
    include "ayar.php";

    $query = "INSERT INTO duyurular(baslik,altBaslik,aciklama,resim,yayinTarihi) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 'sssss', $baslik,$altBaslik,$aciklama,$resim,$olusturulma_tarihi);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}

function editDuyuru(int $id, string $baslik, string $altBaslik,string $aciklama, string $resim) {
    include "ayar.php";
    $query = "UPDATE duyurular SET baslik='$baslik', altBaslik='$altBaslik',aciklama='$aciklama',resim='$resim' WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function editUser(int $id, string $username, int $daireno) {
    include "ayar.php";
    $query = "UPDATE kullanicilar SET username='$username', daireno='$daireno' WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getUser(){
    include "ayar.php";
    $query = "SELECT * from kullanicilar";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getSikayet(){
    include "ayar.php";
    $query = "SELECT * from sikayetler";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function deleteDuyuru(int $id) {
    include 'ayar.php';
    $query = "DELETE FROM Duyurular WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function deleteSikayet(int $id) {
    include 'ayar.php';
    $query = "DELETE FROM sikayetler WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function deleteUser(int $id) {
    include 'ayar.php';
    $query = "DELETE FROM kullanicilar WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function uploadImage(array $file) {
    if(isset($file)) {
        $dest_path = "./img/";
        $filename = $file["name"];
        $fileSourcePath = $file["tmp_name"];
        $fileDestPath = $dest_path.$filename;

        move_uploaded_file($fileSourcePath,$fileDestPath);
    }
}

function kaydetKartBilgileri($conn, $cardNumber, $expiryDate, $cvv, $cardHolder, $saveCard) {
    $cardNumber = mysqli_real_escape_string($conn, $cardNumber);
    $expiryDate = mysqli_real_escape_string($conn, $expiryDate);
    $cvv = mysqli_real_escape_string($conn, $cvv);
    $cardHolder = mysqli_real_escape_string($conn, $cardHolder);
    $saveCard = isset($saveCard) ? 1 : 0;

    $sql = "INSERT INTO kart_bilgileri (kartNumarasi, sonKullanmaTarihi, cvv, kartSahibiAdi, kaydet) 
            VALUES ('$cardNumber', '$expiryDate', '$cvv', '$cardHolder', '$saveCard')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return "Hata: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>