/**
 sidebar
 */
document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.sidenav');
    let instances = M.Sidenav.init(elems, [
        draggable = true,
        preventScrolling = true
    ]);
});

/**
 * slider
 */
document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.slider');
    let instances = M.Slider.init(elems, {
        indicators: true,
        height: 500,
        duration: 500,
        interval: 5000
    });
});

/**
 * Floating action button network
 */
document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.fixed-action-btn');
    let instances = M.FloatingActionButton.init(elems, {
        direction: 'bottom',
        hoverEnabled: false
    });
});

/**
 * modal login
 */
document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.modal');
    let instances = M.Modal.init(elems, {
        opacity: 0.5,
        inDuration: 250,
        outDuration: 250,
        onOpenStart: null,
        onOpenEnd: null,
        onCloseStart: null,
        onCloseEnd: null,
        preventScrolling: true,
        dismissible: true,
        startingTop: '4%',
        endingTop: '10%'
    });
});

/**
 * Ajax vérif login et mdp
 */
// récupération url en cours
let str = location.pathname;
let url = str.split('/');
// récupération de la div d'erreur
const errorLogin = document.getElementById('errorLogin');
//sélection du bouton envoyé de la modal et écoute d"un event sur celui-ci
const mailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const errorEmail = document.getElementById('errorEmail');
const errorPassword = document.getElementById('errorPassword');
mailInput.addEventListener('blur', () => {
    let email = document.getElementById('email').value;
// fonction pour tester si xhr est accepté par le navigateur
    function getXMLHttpRequest() {
        let xhr = null;
        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
                xhr = new XMLHttpRequest();
            }
        } else {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        }
        return xhr;
    }
    let finalEmail = url[0] + 'eteruser/login';
    let xhr = getXMLHttpRequest();
    xhr.open("POST", finalEmail, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("mail=" + email);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            errorEmail.innerHTML = xhr.responseText;
            // alert(xhr.responseText); // Données textuelles récupérées
        }
    };
});
passwordInput.addEventListener('blur', () => {
    let password = document.getElementById('password').value;
// fonction pour tester si xhr est accepté par le navigateur
    function getXMLHttpRequest() {
        let xhr = null;
        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
                xhr = new XMLHttpRequest();
            }
        } else {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        }
        return xhr;
    }
    let finalPath = url[0] + 'eteruser/password';
    let xhr = getXMLHttpRequest();
    xhr.open("POST", finalPath, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("password=" + password);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            errorPassword.innerHTML = xhr.responseText;
            // alert(xhr.responseText); // Données textuelles récupérées
        }
    };
})
// passwordInput.addEventListener('blur', checkUser);

function checkMail() {

}


/* Barre de force du mot de passe

var pass = document.getElementById("signin_user_password")
pass.addEventListener('keyup', function () {
    checkPassword(pass.value)
})

function checkPassword(password) {
    var strengthBar = document.getElementById("strength")
    var strength = 0;
    if (password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
        strength += 1
    }
    if (password.match(/[~<>?]+/)) {
        strength += 1
    }
    if (password.match(/[!@£$%^&*()]+/)) {
        strength += 1
    }
    if (password.length >= 8) {
        strength += 1
    }

    switch (strength) {
        case 0 :
            strengthBar.style.width = "0%";
            break
        case 1:
            strengthBar.style.width = "25%";
            strengthBar.setAttribute ("class","progress-bar progress-bar-striped progress-bar-animated bg-danger")
            break
        case 2:
            strengthBar.style.width = "50%";
            strengthBar.setAttribute ("class","progress-bar progress-bar-striped progress-bar-animated bg-warning")
            break
        case 3:
            strengthBar.style.width = "75%";
            strengthBar.setAttribute ("class","progress-bar progress-bar-striped progress-bar-animated bg-success")
            break
        case 4:
            strengthBar.style.width = "100%";
            strengthBar.setAttribute ("class","progress-bar progress-bar-striped progress-bar-animated bg-success")
            break
    }
}*/

//Prévisualisation de la photo de profil

/*function preview_image(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
reader.readAsDataURL(event.target.files[0]);
}*/