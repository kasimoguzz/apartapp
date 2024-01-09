    <?php
        require "libs/functions.php";
    ?>
    <?php include "partials/_message.php" ?>
    <?php include "partials/_header.php" ?>
    <?php include "partials/_navbar.php" ?>
    <?php
        include "libs/ayar.php";    

        $cardNumber = $expiryDate = $cvv = $cardHolder = $saveCard ="";
        $cardNumberErr = $expiryDateErr = $cvvErr = $cardHolderErr ="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["cardNumber"])) {
                $cardNumberErr = "cardNumber gerekli alan.";
            } else {
                $cardNumber = safe_html($_POST["cardNumber"]);
            }

            if (empty($_POST["expiryDate"])) {
                $expiryDateErr = "expiryDate gerekli alan.";
            } else {
                $expiryDate = safe_html($_POST["expiryDate"]);
            }

            if (empty($_POST["cvv"])) {
                $cvvErr = "cvv gerekli alan.";
            } else {
                $cvv = safe_html($_POST["cvv"]);
            }
            
            $saveCard = isset($_POST["saveCard"]) ? 1 : 0;

            if (empty($_POST["cardHolder"])) {
                $cardHolderErr = "cardHolder gerekli alan.";
            } else {
                $cardHolder = safe_html($_POST["cardHolder"]);
            }

            if (empty($cardNumberErr) && empty($expiryDateErr) && empty($cvvErr) && empty($cardHolderErr) && $saveCard == 1) {
                $sql = "INSERT INTO kart_bilgileri (kart_numarasi, son_kullanma_tarihi, cvv, kart_sahibi_adi, kaydet) VALUES (?, ?, ?, ?, ?)";

                if ($stmt = mysqli_prepare($baglanti, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssssi", $cardNumber, $expiryDate, $cvv, $cardHolder, $saveCard);

                    if (mysqli_stmt_execute($stmt)) {
                        

                        $_SESSION["message"] = $id." aidatınız ödendi";
                        $_SESSION["type"] = "sucsess";
                        header("Location: aidat.php");
                        
                       
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

    <div class="container">
        <div class="payment-container">
            <h2 class="text-center mb-4">Ödeme Bilgileri</h2>

            <form method="post">
                <div class="form-group">
                    <label for="cardNumber">Kredi Kartı Numarası</label>
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Kredi kartı numaranızı girin" required>
                    <span class="error"><?php echo $cardNumberErr; ?></span>
                </div>

                <div class="form-row">
                    <div class="col-6 form-group">
                        <label for="expiryDate">Son Kullanma Tarihi</label>
                        <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                        <span class="error"><?php echo $expiryDateErr; ?></span>
                    </div>
                    <div class="col-6 form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                        <span class="error"><?php echo $cvvErr; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cardHolder">Kart Sahibi Adı</label>
                    <input type="text" class="form-control" id="cardHolder" name="cardHolder" placeholder="Kart sahibinin adını girin" required>
                    <span class="error"><?php echo $cardHolderErr; ?></span>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="saveCard" name="saveCard">
                    <label class="form-check-label" for="saveCard">Kart bilgilerimi kaydet</label>
                </div>

                <button type="submit" class="btn btn-pay btn-block">Ödemeyi Tamamla</button>
            </form>
        </div>
    </div>
