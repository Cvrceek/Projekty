<?php
    $db = new MySQLDB();

    if(isset($_GET['login']) && $_GET['login'] == "logout") {
        logout();
    }

    list($user_id, $user_name, $user_user, $user_email, $user_about, $user_rights) = $db->get_row("SELECT id, Name, UserName, Email, about, prava FROM users WHERE UserName='$_SESSION[login]'");
?>
<!DOCTYPE html>
<html lang="cz">
    <head>
        <base href="./" />
        <meta charset="UTF-8" />
        <meta name="keywords" content="slova pro vyhledÃ¡vaÄ?" />
        <meta name="description" content="popis stranky pro vyhledÃ¡vaÄ?e" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="images/system/favicon.ico" />
        <title>Administrace</title>
    </head>
    <body>
        <div id="frame">
            <!-- HLAVICKA-->
            <header>
                <ul>
                    <span class="user"><?php echo($user_name); ?></span>
                    <li><a href="index.php">profil</a></li>
                    /
                    <li><a href="index.php?login=logout">logout</a></li>
                </ul>

                <div id="logo"> 
                    <a href="../"><img src="css/graphics/logo.jpg" title="Logo" alt="logo" width="143px" height="54px"></a>
                    <p>Administration system</p>
                </div>
                <div class="clearfix"></div>
            </header>
            
            <!-- MENU -->
            <nav>
                <ul>
                    <li><a href="../">Zpet na web</a></li>
                    <li><a href="index.php?pg=articles">Produkty</a></li>
                </ul>
            </nav>
            
            <!-- MAIN -->
            <main>
                <!-- HLAVNI PANEL -->
                <?php
                    if(!isset($_GET['pg'])) {
                        include('web/content/articles.php');
                    } else {
                        include('web/content/'. $_GET['pg'] .'.php');
                    }
                ?>
            </main>
        </div>
    </body>
</html>