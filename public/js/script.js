const social = document.getElementById('social');
social.onmouseover = changeCss;
console.log(social);
function changeCss() {
    console.log('check');

    const socialIcon = document.getElementById('socialIcon');
    console.log(socialIcon);
    socialIcon.style.top = '200px';
    socialIcon.style.right = '200px';
    socialIcon.style.color = 'white';
}
var pass = document.getElementById("password")
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
        case 1:
            strengthBar.value = 20;
            color = "red";
            break
        case 2:
            strengthBar.value = 40;
            color = "orange";
            break
        case 3:
            strengthBar.value = 60;
            color = "green";
            break
        case 4:
            strengthBar.value = 80;
            color = "green";
            break
        case 5:
            strengthBar.value = 100;
            color = "green";
            break
    }
}
