<?php
    if($_POST['login_ok']) {
        login($_POST['login'], $_POST['pass']);
    }
?>

<!DOCTYPE html>
<html lang="cz">
    <head>
        <base href="./" />
        <meta charset="UTF-8" />
        <meta name="author" content="Jakub Nezval" />
        <meta name="keywords" content="slova pro vyhledávač" />
        <meta name="description" content="popis stranky pro vyhledávače" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="images/system/favicon.ico" />
        <title>Administrace</title>
    </head>
    <body>
        <div id="frame">
            <!-- HLAVICKA-->
            <header>
                <ul>
                    <span class="user">Login</span>
                </ul>

                <div id="logo">
                    <a href="../"><img src="css/graphics/logo.jpg" title="Logo" alt="logo" width="143px" height="54px"></a>
                    <p>Administration system</p>
                </div>
                <div class="clearfix"></div>
            </header>

            <!-- MAIN -->
            <main id="login_screen">
                <!-- HLAVNI PANEL -->
                <article>
                    <form id="super_form" action="" method="post">
                        <label>Login</label>
                        <input type="text" name="login"><br>
                        <label>Password</label>
                        <input type="password" name="pass"><br>
                        <input class="send_post" type="submit" name="login_ok" value="Login">
                        <div class="clearfix"></div>
                    </form>
                </article>
            </main>
        </div>
    </body>
</html>