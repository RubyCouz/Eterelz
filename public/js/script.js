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


document.addEventListener('DOMContentLoaded', function() {
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