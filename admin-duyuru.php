<?php
    require "libs/functions.php";

    if(!isAdmin()) {
        header("Location: unauthorize.php");
    }
?>

<?php include "partials/_message.php" ?>
<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">

<div class="row">
    <div class="col-12">
        <div class="border p-2 mb-2">
            <a href="duyuru-olustur.php" class="btn btn-primary">Duyuru Ekle</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:120px;">Duyuru Id</th>
                    <th style="width:120px;">Resim</th>
                    <th>Duyuru Başlık</th>
                    <th style="width:130px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getDuyuru(); while($duyuru = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $duyuru["id"]?></td>
                        <td><img class="img-fluid" src="img/<?php echo $duyuru["resim"] ?>" alt=""></td>
                        <td><?php echo $duyuru["baslik"]?></td>
                        <td>
                            <a href="duyuru-duzenle.php?id=<?php echo $duyuru["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="duyuru-delete.php?id=<?php echo $duyuru["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "partials/_footer.php" ?>