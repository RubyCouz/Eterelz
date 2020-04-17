UIkit.util.ready(function () {

    var bar = document.getElementById('mdp-progressbar');

    var animate = setInterval(function () {

        bar.value += 10;

        if (bar.value >= bar.max) {
            clearInterval(animate);
        }

    }, 1000);

});
