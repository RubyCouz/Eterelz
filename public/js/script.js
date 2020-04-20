/**
 sidebar
 */
$(document).ready(function () {
    let trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed === true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
});

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

const logo = document.querySelector('#logo');
const social = document.querySelector('#social');
const close = document.querySelector('#close');
social.onclick = () => {
    logo.style.transition = '0.8s';
    logo.style.position = 'absolute';
    logo.style.top = '25%'
    logo.style.right = '15%';

}
close.onclick = () => {
    logo.style.transition = '1.2s';
    logo.style.top = '25%'
    logo.style.right = '3%';
}

// Barre de force du mot de passe

let pass = document.getElementById("registration_user_password")
    pass.addEventListener('keyup', function() {
        checkPassword(pass.value)
    })
    function checkPassword(password) {
        let strengthBar = document.getElementById("strength")
        let strength = 0;
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
}

//Prévisualisation de la photo de profil

function preview_image(event){

    let reader = new FileReader();

    reader.onload = function(){

        let output = document.getElementById('output_image');
        output.src = reader.result;
    }
    
reader.readAsDataURL(event.target.files[0]);
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
