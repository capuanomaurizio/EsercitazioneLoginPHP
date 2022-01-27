<?php
    require_once("Utente.php");
    $json = file_get_contents("utenti.json");
    $utenti = json_decode($json);
    $utenteEsistente = false;
    foreach ($utenti as $utente) {
        $u = new Utente($utente->name, $utente->username, $utente->email, $utente->password);
        if(strcmp($u->getEmail(), $_POST['email'])==0){
            $utenteEsistente = true;
        }
    }
    if($utenteEsistente==false){
        $nuovoUtente = new Utente($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
        session_start();
        $_SESSION["user"] = $nuovoUtente;
        array_push($utenti, $nuovoUtente);
        $json = json_encode($utenti);
		file_put_contents("utenti.json", $json);
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Signup</title>
    <style>@import url(style.css);</style>
</head>
<body>
    <div id="container">
        <div id="content">
            <div class="outputs">
                <?php
                if($utenteEsistente==true){
                    ?>
                    <span class="sentences">This email address is already connected to another account</span><br><br>
                    <span class="sentences">You will be automatically redirected to the login page</span><br><br>
                    <span id="countdown" class="sentences"></span><br><br><br><br><br><br><br><br>
                    <span class="sentences" style="margin:28px">Not working? Click this</span>
                    <input type="button" value="Login page" class="submitBtn" onClick="window.location.href='./'" style="margin-top:10px">
                    <?php
                    header('refresh: 8.5; ./');
                }
                else{
                    echo "<span class=\"sentences\">Welcome </span><h3>".$_POST['username']."</h3><br><br><br>";
                    ?>
                    <br><br><br><br><br><br><br><br><br>
                    <input type="button" value="View profile info" class="submitBtn" onClick="window.location.href='./profileInfo.php'">
                    <input type="button" value="Logout" class="submitBtn" onClick="window.location.href='./'">
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        var timeleft = 7;
        var downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "Redirecting...";
            }
            else {
                document.getElementById("countdown").innerHTML = "Redirecting in " + timeleft + " seconds...";
            }
            timeleft -= 1;
        }, 1000);
    </script>
</body>
</html>