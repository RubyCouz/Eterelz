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