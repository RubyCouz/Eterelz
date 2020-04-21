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
            strengthBar.style.width = "0%";
            break
        case 1:
            strengthBar.style.width = "25%";
            
            break
        case 2:
            strengthBar.style.width = "50%";
            break
        case 3:
            strengthBar.style.width = "75%";
            break
        case 4:
            strengthBar.style.width = "100%";
            break
    }
}
