<?php
require "libs/functions.php";

if (isset($_GET["yayinTarihi"])) {
    $secilenTarih = $_GET["yayinTarihi"];
    $duyurular = getDuyurularByYayinTarihi($secilenTarih);
} else {
    $secilenTarih = null;
    $duyurular = getDuyuru();
}
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">
    <div class="row">
        <div class="col-3">
            <?php include "partials/_menu.php" ?>
        </div>
        <div class="col-9">
            <?php if(mysqli_num_rows($duyurular) > 0): ?>
                <?php while($duyuru = mysqli_fetch_assoc($duyurular)): ?>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-4">
                                <img src="img/<?php echo $duyuru["resim"]; ?>" class="img-fluid rounded-start">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="duyuru-detay.php?id=<?php echo $duyuru["id"];?>">
                                            <?php echo $duyuru["baslik"]; ?>
                                        </a>
                                    </h5>
                                    <h6>Yayın Tarihi</h6>
                                    <p><?php echo $duyuru["yayinTarihi"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning">
                    Duyuru bulunamadı.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "partials/_footer.php" ?>
