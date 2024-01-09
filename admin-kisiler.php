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
                    <th style="width:120px;">user Id</th>
                    <th>Ad Soyad</th>
                    <th>Daire No</th>
                    <th>Email</th>
                    <th>tel no</th>
                    <th style="width:130px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getUser(); while($user = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $user["id"]?></td>
                        
                        <td><?php echo $user["username"]?></td>
                        <td><?php echo $user["daireno"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["tel"] ?></td>
                        <td>
                            <a href="kisi-duzenle.php?id=<?php echo $user["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="kisi-sil.php?id=<?php echo $user["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "partials/_footer.php" ?>