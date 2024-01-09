<?php
    require "libs/functions.php";
?>

    <?php include "partials/_message.php" ?>
    <?php include "partials/_header.php" ?>
    <?php include "partials/_navbar.php" ?>
    <?php
        include "libs/ayar.php";    

        $adSoyad = $sikayetMetni ="";
        $adSoyadErr = $sikayetMetniErr="";
        $olusturulma_tarihi = date("Y-m-d");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["adSoyad"])) {
                $adSoyadErr = "adSoyad gerekli alan.";
            } else {
                $adSoyad = safe_html($_POST["adSoyad"]);
            }

            if (empty($_POST["sikayetMetni"])) {
                $sikayetMetniErr = "şikayet metni gerekli alan.";
            } else {
                $sikayetMetni = safe_html($_POST["sikayetMetni"]);
            }


            if (empty($adSoyadErr) && empty($sikayetMetniErr)) {
                $sql = "INSERT INTO sikayetler (adSoyad,sikayet,tarih) VALUES ( ?, ?,?)";

                if ($stmt = mysqli_prepare($baglanti, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $adSoyad, $sikayetMetni,$olusturulma_tarihi);

                    if (mysqli_stmt_execute($stmt)) {
                        

                      
                        header("Location: sikayet.php");
                        $_SESSION["message"] = $id." şikayetiniz kaydedildi.";
                        $_SESSION["type"] = "sucsess";
                       
                    } else {
                        echo "Hata: " . mysqli_error($baglanti);
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Hata: " . mysqli_error($baglanti);
                }
            }
            mysqli_close($baglanti);
        }
    ?>

<div class="container mt-5">
    <h2 class="mb-4">Şikayet Bildirme Formu</h2>

    <form method="POST">
        <div class="form-group">
            <label for="adSoyad">Adınız Soyadınız:</label>
            <input type="text" class="form-control" name="adSoyad" id="adSoyad" placeholder="Adınız ve Soyadınız">
        </div>

        <div class="form-group">
            <label for="sikayetMetni">Şikayet Metni:</label>
            <textarea class="form-control" id="sikayetMetni" name="sikayetMetni" rows="5" placeholder="Şikayetinizi buraya yazınız"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>