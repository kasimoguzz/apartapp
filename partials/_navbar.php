<nav class="navbar navbar-expand-lg  navbar-dark" style="background-color:  #333333;">
    <div class="container py-2">
        <a href="welcome.php" class="navbar-brand"><i class="fa-solid fa-building"></i><span style="margin-left:5px;">ApartApp</span></a>
       
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa-solid fa-bullhorn"></i><span style="margin-left:5px;">Duyurular</span></a>
            </li>
            <?php if(isLoggedIn()): ?>
            <li class="nav-item">
                    <a href="aidat.php" class="nav-link">Aidat Ödeme</a>
            </li>
            <?php endif; ?> 
            <li class="nav-item">
                    <a href="sikayet.php" class="nav-link">Şikayet/Sorun Bildir</a>
            </li>
            
            <?php if(isAdmin()): ?>
                <li class="nav-item">
                    <a href="admin-kisiler.php" class="nav-link">Kişiler</a>
                </li>
                <li class="nav-item">
                    <a href="admin-duyuru.php" class="nav-link">Yönetici Duyuru</a>
                </li>
                <li class="nav-item">
                    <a href="admin-sikayet.php" class="nav-link">Admin Şikayet</a>
                </li>
            <?php endif; ?> 
            
            

        </ul>

        <ul class="navbar-nav me-2">

            <?php if(isLoggedIn()): ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link"><i class="fa-solid fa-door-open"></i><span style="margin-left:5px;">Çıkış</span></a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Hoş geldiniz, <?php echo $_SESSION["username"] ?></a>
                </li>
               
            <?php else: ?>   
                <li class="nav-item">
                    <a href="login.php" class="nav-link"><i class="fa-solid fa-house"></i><span style="margin-left:5px;">Giriş</span></a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link"><i class="fa-solid fa-user"></i><span style="margin-left:5px;">Kayıt ol</span></a>
                </li>
               
            <?php endif; ?>   
        </ul>
    </div>
</nav>