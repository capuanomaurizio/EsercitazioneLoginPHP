<?php
    require_once("Utente.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Profile info</title>
    <style>@import url(style.css);</style>
</head>
<body onLoad="countdown()">
    <div id="container">
        <div id="content">
            <div class="outputs">
                <?php
                    echo "<span class=\"sentences\">Welcome </span><h3>".$_SESSION["user"]->getUsername()."</h3><br><br><br>";
                    echo "<span class=\"sentences\">your name is: </span><h3>".$_SESSION["user"]->getName()."</h3><br><br><br>";
                    echo "<span class=\"sentences\">your email is: </span><h3>".$_SESSION["user"]->getEmail()."</h3><br><br><br>";
                    echo "<span class=\"sentences\">your password is:  </span><h3>".$_SESSION["user"]->getPassword()."</h3><br><br><br><br>";
                    echo "<input type=\"button\" value=\"Logout\" class=\"submitBtn\" onClick=\"window.location.href='./'\">";
                ?>
            </div>
        </div>
    </div>
</body>
</html>