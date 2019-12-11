<?php session_start();?>
<div class="header">
<header style="margin:0; padding:0;">
    <nav class="nav-wrapper warmSand">
        <div class="container">
            <a href="index.php" class="brand-logo center">Logo placeholder</a>
            <a id="sidenav" href="" class="sidenav-trigger" data-target="mobile-menu">
                <i class="material-icons">menu</i>
                </a>
            <div class="right">
                <ul class="right">
                    <?php if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){
                        echo '<li><span>Welkom <strong style="font-size:1.5rem;">'.$_SESSION["username"].'</strong></span></li>';
                        echo '<li><a href="account.php"><i class="small material-icons">account_circle</i></a></li>';
                        echo '<li><a href="meldingen.php"><i class="small material-icons">notifications</i></a></li>';
                        echo '<li><a href="helpers/logoutScript.php"><i class="small material-icons">exit_to_app</i></a></li>';
                        } else if(!isset($_SESSION["username"])){
                        echo '<li><a href="login.php">Login</a></li>';
                        echo '<li><a href="Register email.php">Registreren</a></li>';
                        echo '<li><a href="login.php"><i class="small material-icons">notifications</i></a></li>';
                        }
                    ?>
                </ul>
            </div>
            <ul style="height:100%;" class="sidenav grey lighten-2" id="mobile-menu">
                <?php include 'rubrics.php'; ?>
            </ul>
        </div>
    </nav>
</header>
</div>