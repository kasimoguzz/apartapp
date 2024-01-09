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
      
        <table class="table table-bordered">
            <thead>
                <tr>
      
                    <th>Ad Soyad</th>
                    <th>Şikayet</th>
                    <th>Şikayet Tarihi</th>
                    <th style="width:130px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getSikayet(); while($sikayet = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        
                        
                        <td><?php echo $sikayet["adSoyad"]?></td>
                        <td><?php echo $sikayet["sikayet"] ?></td>
                        <td><?php echo $sikayet["tarih"] ?></td>
                        <td>
                            <a href="sikayet-sil.php?id=<?php echo $sikayet["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "partials/_footer.php" ?>