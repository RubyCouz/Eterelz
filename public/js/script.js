


// Barre de force du mot de passe
/*function validatePassword(password) {

    // Do not show anything when the length of password is zero.
    if (password.length === 0) {
        document.getElementById("msg").innerHTML = "";
        return;
    }
    // Create an array and push all possible values that you want in password
    var matchedCase = new Array();
    matchedCase.push("[$@$!%*#?&]"); // Special Charector
    matchedCase.push("[A-Z]");      // Uppercase Alpabates
    matchedCase.push("[0-9]");      // Numbers
    matchedCase.push("[a-z]");     // Lowercase Alphabates

    // Check the conditions
    var ctr = 0;
    for (var i = 0; i < matchedCase.length; i++) {
        if (new RegExp(matchedCase[i]).test(password)) {
            ctr++;
        }
    }
    // Display it
    var color = "";
    var strength = "";
    switch (ctr) {
        case 0:
        case 1:
        case 2:
            strength = "Très faible";
            color = "red";
            break;
        case 3:
            strength = "Moyen";
            color = "orange";
            break;
        case 4:
            strength = "Fort";
            color = "green";
            break;
    }
    document.getElementById("msg").innerHTML = strength;
    document.getElementById("msg").style.color = color;
}
*/
//
// var pass = document.getElementById("password")
//     pass.addEventListener('keyup', function() {
//         checkPassword(pass.value)
//     })
//     function checkPassword(password) {
//         var strengthBar = document.getElementById("strength")
//         var strength = 0;
//             if (password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
//                 strength += 1
//             }
//             if (password.match(/[~<>?]+/)) {
//                 strength += 1
//             }
//             if (password.match(/[!@£$%^&*()]+/)) {
//                 strength += 1
//             }
//             if (password.length >= 8) {
//                 strength += 1
//             }
//
//     switch (strength) {
//         case 0:
//             strengthBar.value = 20;
//             color = "red";
//             break
//         case 1:
//             strengthBar.value = 40;
//             color = "orange";
//             break
//         case 2:
//             strengthBar.value = 60;
//             color = "green";
//             break
//         case 3:
//             strengthBar.value = 80;
//             color = "green";
//             break
//         case 4:
//             strengthBar.value = 100;
//             color = "green";
//             break
//     }
// }


/**
 * widget social
 */


let closeFn;
function closeShowingModal() {
    let showingModal = document.querySelector('.modal1.show');
    if (!showingModal) return;
    showingModal.classList.remove('show');
    document.body.classList.remove('disable-mouse');
    document.body.classList.remove('disable-scroll');
    if (closeFn) {
        closeFn();
        closeFn = null;
    }
}
document.addEventListener('click', function (e) {
    let target = e.target;
    if (target.dataset.ctaTarget) {
        closeFn = cta(target, document.querySelector(target.dataset.ctaTarget), { relativeToWindow: true }, function showModal(modal) {
            modal.classList.add('show');
            document.body.classList.add('disable-mouse');
            if(target.dataset.disableScroll){
                document.body.classList.add('disable-scroll');
            }
        });
    }
    else if (target.classList.contains('modal-close-btn')) {
        closeShowingModal();
    }
});
document.addEventListener('keyup', function (e) {
    if (e.which === 27) {
        closeShowingModal();
    }
})
// déclaration des évènements
social.onmouseover = socialOn;
social.onmouseout = socialOff;

/**
 * fonction faisant apparaitre les icônes sociales lors de la transition
 */
function socialOn() {
    // pendant que la transition tourne
    social.ontransitionrun = () => {
        // modification du css de l'icône twitch
        twitch.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        twitch.style.top = '160px';
        twitch.style.right = '345px';
        twitch.style.display = 'block';
        // modification du css de l'icône discord
        discord.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        discord.style.top = '220px';
        discord.style.right = '340px';
        discord.style.display = 'block';
        // modification du css de l'icône youtube
        youtube.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        youtube.style.top = '280px';
        youtube.style.right = '300px';
        youtube.style.display = 'block';
        // modification du css de l'icône twitter
        twitter.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        twitter.style.top = '325px';
        twitter.style.right = '245px';
        twitter.style.display = 'block';
        // modification du css de l'icône facebook
        facebook.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        facebook.style.top = '345px';
        facebook.style.right = '180px';
        facebook.style.display = 'block';
    };
}

/**
 * fonction faisant disparaitre les icônes sociales
 */
function socialOff() {
    // pendant que la transition tourne
    social.ontransitionrun = () => {
        twitch.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        twitch.style.top = '-30px';
        twitch.style.right = '-40px';
        twitch.style.display = 'block';
        // modification du css de l'icône discord
        discord.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        discord.style.top = '-30px';
        discord.style.right = '-40px';
        discord.style.display = 'block';
        // modification du css de l'icône youtube
        youtube.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        youtube.style.top = '-30px';
        youtube.style.right = '-40px';
        youtube.style.display = 'block';
        // modification du css de l'icône twitter
        twitter.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        twitter.style.top = '-30px';
        twitter.style.right = '-40px';
        twitter.style.display = 'block';
        // modification du css de l'icône facebook
        facebook.style.transition = '0.8s cubic-bezier(.68,-0.55,.27,1.55)';
        facebook.style.top = '-30px';
        facebook.style.right = '-40px';
        facebook.style.display = 'block';
    };
}

// Barre de force du mot de passe

var pass = document.getElementById("registration_user_password")
    pass.addEventListener('keyup', function() {
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
        case 0:
            strengthBar.value = 0;
            color = "red";
            break
        case 1:
            strengthBar.value = 25;
            color = "red";
            break
        case 2:
            strengthBar.value = 50;
            color = "jaune";
            break
        case 3:
            strengthBar.value = 75;
            color = "orange";
            break
        case 4:
            strengthBar.value = 100;
            color = "green";
            break
    }
}
