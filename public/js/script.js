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
UIkit.util.ready(function () {

    var bar = document.getElementById('mdp-progressbar');

    var animate = setInterval(function () {

        bar.value += 10;

        if (bar.value >= bar.max) {
            clearInterval(animate);
        }

    }, 1000);

});
