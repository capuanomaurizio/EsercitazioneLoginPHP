<!DOCTYPE html>
<html lang="it">
<head>
    <title>Forgot password?</title>
    <script>
        function validaEmail(stringa){
            var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(stringa.match(pattern)){
                return true;
            }
            document.getElementById("errorSpann").style.display = "inline";
            return false;
        }
    </script>
    <style>@import url(style.css);</style>
</head>
<body>
    <div id="container">
        <div id="content">
            <form action="recoverPsw.php" method="POST" onSubmit="return validaEmail(this.email.value)" class="outputs">
                <span class="sentences">Password recovery page</span><br><br><br><br>
                <span class="errorSpan" id="errorSpann" style="display:none">Incorrect email format</span>
                <input type="email" name="email" class="inputField" placeholder="Insert your email">
                <input type="submit" value="Recover" class="submitBtn">
            </form>
        </div>
    </div>
</body>
</html>