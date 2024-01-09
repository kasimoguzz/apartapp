<?php
    if(isset($_GET["yayinTarihi"]) && is_numeric($_GET["yayinTarihi"])) {
        $secilenTarih = $_GET["yayinTarihi"];
    }
?>


<div class="list-group">
    <a href="duyurular.php" class="list-group-item list-group-item-actio">Duyuru Tarihleri</a>
    <?php 
        $sonuc = getDuyuruTime();
        while($duyuru = mysqli_fetch_assoc($sonuc)): ?>

        <a href="<?php echo "duyurular.php?yayinTarihi=".$duyuru["yayinTarihi"]?>" 
            class="list-group-item list-group-item-action 
            <?php
                if($duyuru["yayinTarihi"] == $secilenTarih) {
                    echo "active";
                }            
            ?>">
            <?php echo $duyuru["yayinTarihi"]; ?>
        </a>

    <?php endwhile; ?>
</div>