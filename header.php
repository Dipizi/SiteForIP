<style>
    @import url(/styles/header.css);
    @import url(/styles/index.css);
</style>

<header>
    <div class="head-background">
        <div class="auth-block">
            <?php if(isset($_SESSION['logged_user'])) : ?>
                    <ul>
                        <li><a href="profile.php"><?php echo $_SESSION['logged_user']->login; ?></a></li>
                        <li><a href="logout.php">Выйти</a></li>
                    </ul>
            <?php else : ?>
                    <ul>
                        <li><a href="signup.php">Регистрация</a></li>
                        <li><a href="login.php">Войти</a></li>
                    </ul>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="nav-menu">
        <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/catalog.php">Каталог</a></li>
            <li><a href="/additem.php">Добавить</a></li>
        </ul>
    </div>
</header>