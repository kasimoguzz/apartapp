<?php
    require "libs/functions.php";
?>

<?php

   if(empty($_GET["id"])) {
        header('Location: admin-kisiler.php');
   }

   $id = $_GET["id"];

   $result =  getUserById($id);
   $user = mysqli_fetch_assoc($result);

   if($_SERVER["REQUEST_METHOD"]=="POST") {
       if(deleteUser($id)) {
           $_SESSION["message"] = $id." numaralı kişi silindi";
           $_SESSION["type"] = "danger";
           
           header('Location: admin-kisiler.php');
        } else {
            echo "hata";
        }
    }
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="POST">
                    <b><?php echo $user["username"]?></b> isimli kişiyi silmek istiyor musunuz?
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>