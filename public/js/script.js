// récupération des éléments du dom
const social = document.getElementById('social');
const twitch = document.getElementById('twitch');
const discord = document.getElementById('discord');
const youtube = document.getElementById('youtube');
const twitter = document.getElementById('twitter');
const facebook = document.getElementById('facebook');

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

// comment
