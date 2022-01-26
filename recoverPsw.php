<?php
    $json = file_get_contents("utenti.json");
    $utenti = json_decode($json);
    foreach ($utenti as $utente){
        $u = new Utente($utente->username, $utente->email, $utente->password);
        if(strcmp($u->getEmail(), $_POST['email'])==0){
            $utenteCorrente = $u;
            $utenteRiconosciuto = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Recover password</title>
    <style>@import url(style.css);</style>
    <script>
        function countdown(){
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
        }
    </script>
</head>
<body onLoad="countdown()">
    <div id="container">
        <div id="content">
            <div class="outputs">
                <?php
                if(isset($utenteRiconosciuto)){
                    echo "<span class=\"sentences\">Welcome </span><h3>".$utenteCorrente->username."</h3><br><br><br>";
                    echo "<span class=\"sentences\">your password is:  </span><h3>".$utenteCorrente->password."</h3><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                    echo "<input type=\"button\" value=\"Login page\" class=\"submitBtn\" onClick=\"window.location.href='./'\">";
                }
                else{
                    ?>
                    <span class="sentences">This email is not connected to any account, please check it and try again</span><br><br>
                    <span class="sentences">You will be automatically redirected to the login page</span><br><br>
                    <span id="countdown" class="sentences"></span><br><br><br><br><br><br><br><br>
                    <span class="sentences" style="margin:28px">Not working? Click this</span>
                    <input type="button" value="Login page" class="submitBtn" onClick="window.location.href='./'" style="margin-top:10px">
                    <?php
                        header('refresh: 8.5; ./');
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>