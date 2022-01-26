<?php
if(isset($_SESSION)){
    unset($_SESSION["user"]);
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="in">
<head>
    <title>Welcome!</title>
    <style>@import url(style.css);</style>
    <script src="script.js">
    </script>
</head>
<body>
    <div id="container">
        <div id="content">
            <div class="buttonBox">
                <div id="btn"></div>
                <button type="button" class="toggleBtn" id="toggleBtnLogin" onClick="login()" style="color:white">Log in</button>
                <button type="button" class="toggleBtn" id="toggleBtnSignup" onClick="signup()">Sign up</button>
            </div>
            <form action="login.php" method="POST" onSubmit="return validaLogin(this)" id="login" class="inputs">
                <span class="errorSpan" id="errorSpanLogin" style="display:none">Incorrect format of one or more fields</span>
                <input type="email" name="email" class="inputField" value="<?php if(isset($_COOKIE["email"])) echo $_COOKIE["email"];?>" placeholder="Email">
                <input type="password" name="password" class="inputField" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE["password"];?>" placeholder="Password"><br><br>
                <a id="forgotPsw" href="forgotPsw.php">Forgot password?</a><br>
                <input type="checkbox" name="keepLogged" id="keepLogged" class="checkBox"><label for="keepLogged">Keep me logged in</label>
                <button type="submit" class="submitBtn">Log in</button>
            </form>
            <form action="signup.php" method="POST" onSubmit="return validaSignup(this)" id="signup" class="inputs">
                <span class="errorSpan" id="errorSpanSignup" style="display:none">Incorrect format of one or more fields</span>
                <input type="text" name="username" class="inputField" placeholder="Username (alphanumeric 5-20 characters)">
                <input type="email" name="email" class="inputField" placeholder="Email (typical format)">
                <input type="password" name="password" class="inputField" placeholder="Password (1 number, 1 upper, 1 lower, 8 chars)">
                <input type="checkbox" id="agreeConditions" class="checkBox" required><label for="agreeConditions">I agree to the terms and conditions</label>
                <button type="submit" class="submitBtn">Sign up</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");

        function signup(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
            document.getElementById("toggleBtnSignup").style.color = "white";
            document.getElementById("toggleBtnLogin").style.color = "black";
            document.getElementById("errorSpanLogin").style.display = "none";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
            document.getElementById("toggleBtnLogin").style.color = "white";
            document.getElementById("toggleBtnSignup").style.color = "black";
            document.getElementById("errorSpanSignup").style.display = "none";
        }
    </script>
</body>
</html>