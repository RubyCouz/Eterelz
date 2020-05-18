function verif()
{
// Récupère la valeur saisie dans le champ input

    var mailf = $("#emailf").val();
    var mailf_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;

// On teste si la valeur est bonne

    // EMAIL

    if (mailf === "")
    {
        var html = '<div class="alert alert-danger" role="alert">Votre email doit être renseigné !</div>';
        $("#alertforgot").append(html);
        return false;
    }
    else if (mailf_v.test(mailf) === false)
    {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alertforgot").append(html);
        return false;
    }
    else{}

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

$("#button").click(function(event)
{
    /*
    On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */
    event.preventDefault();

    // Appel de la fonction verif()
    verif();
});

function verif2()
{
// Récupère la valeur saisie dans le champ input

    var newmdp = $("#pass").val();
    var newmdp_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;

// On teste si la valeur est bonne

    // EMAIL

    if (newmdp === "")
    {
        var html = '<div class="alert alert-danger" role="alert">Votre nouveau mot de passe doit être renseigné !</div>';
        $("#alertnewmdp").append(html);
        return false;
    }
    else if (newmdp_v.test(newmdp) === false)
    {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alertnewmdp").append(html);
        return false;
    }
    else{}

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

$("#button").click(function(event)
{
    /*
    On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */
    event.preventDefault();

    // Appel de la fonction verif()
    verif2();
});