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
        case 0 :
            strengthBar.value = 0;
            break
        case 1:
            strengthBar.value = 25;
            color = "red";
            break
        case 2:
            strengthBar.value = 50;
            color = "orange";
            break
        case 3:
            strengthBar.value = 75;
            color = "green";
            break
        case 4:
            strengthBar.value = 100;
            color = "green";
            break
    }
}

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
    const socialIcon = document.getElementById('socialIcon');
    console.log(socialIcon);
    socialIcon.style.top = '200px';
    socialIcon.style.right = '200px';
    socialIcon.style.color = 'white';



