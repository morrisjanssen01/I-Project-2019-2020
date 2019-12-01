<div class="header">
<header>
    <nav class="nav-wrapper warmSand">
        <div class="container">
            <a href="../html/index.php" class="brand-logo">Logo placeholder</a>
            <a id="sidenav" href="" class="sidenav-trigger" data-target="mobile-menu">
                <i class="material-icons">menu</i>
            </a>
            <div class="right">
                <ul class="right">
                    <?php if (isset($_SESSION["username"])&&!empty($_SESSION["username"])){
                        echo '<li><span>Welkom <strong style="font-size:1.5rem;">'.$_SESSION["username"].'</strong></span></li>';
                        echo '<li><a href="../html/account.php"><i class="small material-icons">account_circle</i></a></li>';
                        echo '<li><a href="../html/meldingen.php"><i class="small material-icons">notifications</i></a></li>';
                        echo '<li><a href="../helpers/logOut.php"><i class="small material-icons">exit_to_app</i></a></li>';
                        } else if(!isset($_SESSION["username"])){
                        echo '<li><a href="../html/login.php">Login</a></li>';
                        echo '<li><a href="../html/Register email.php">Registreren</a></li>';
                        echo '<li><a href="../html/login.php"><i class="small material-icons">notifications</i></a></li>';
                        }
                    ?>
                </ul>
            </div>
            <ul class="sidenav grey lighten-2" id="mobile-menu">
                <li><a href="login.html">Login</a></li>
            </ul>
        </div>
    </nav>
</header>
</div>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
</script>