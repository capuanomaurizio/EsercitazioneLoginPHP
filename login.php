<?php
    require_once("Utente.php");
    $json = file_get_contents("utenti.json");
    $utenti = json_decode($json);
    foreach ($utenti as $utente){
        $u = new Utente($utente->username, $utente->email, $utente->password);
        if(strcmp($u->getEmail(), $_POST['email'])==0){
            $utenteCorrente = $u;
            if(strcmp($u->getPassword, $_POST['password'])==0){
                $utenteLoggato = true;
                session_start();
                $_SESSION["user"] = $u;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Login</title>
    <style>@import url(style.css);</style>
</head>
<body>
    <div id="container">
        <div id="content">
            <div class="outputs">
                <?php
                if(isset($utenteLoggato)){
                    echo "<span class=\"sentences\">Welcome </span><h3>".$utenteCorrente->username."</h3><br><br><br>";
                    echo "<span class=\"sentences\">your email is: </span><h3>".$utenteCorrente->email."</h3><br><br><br>";
                    ?>
                    <span class="sentences">your password is: </span><h3>😎</h3><br><br><br><br><br><br><br><br>
                    <input type="button" value="Logout" class="submitBtn" onClick="window.location.href='./'">
                    <?php
                    if(isset($_POST["keepLogged"])){
                        setcookie("email", $utenteCorrente->email, time()+3600);
                        setcookie("password", $utenteCorrente->password, time()+3600);
                    }
                }
                else{
                    ?>
                    <span class="sentences">Wrong email or password, please check your credentials and try again</span><br><br>
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