function validaUsername(stringa){
    var pattern = /^[a-zA-Z0-9]{5,20}$/;
    if(stringa.match(pattern)){
        return true;
    }
    return false;
}

function validaPassword(stringa){
    var pattern = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/;
    if(stringa.match(pattern)){
        return true;
    }
    return false;
}

function validaEmail(stringa){
    var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(stringa.match(pattern)){
        return true;
    }
    return false;
}

function validaLogin(form){
    if(!validaEmail(form.email.value) || !validaPassword(form.password.value)){
        document.getElementById("errorSpanLogin").style.display = "inline";
        return false;
    }
    return true;
}

function validaSignup(form){
    if(!validaUsername(form.username.value) || !validaPassword(form.password.value) || !validaEmail(form.email.value)){
        document.getElementById("errorSpanSignup").style.display = "inline";
        return false;
    }
    return true;
}