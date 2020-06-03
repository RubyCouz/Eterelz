//Verification du mail pour lien de réinitialisation

function verif()
{
// Récupère la valeur saisie dans le champ input

    var mailf = $("#emailf").val();
    var mailf_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;

// On teste si la valeur est bonne

    // EMAIL

    if (mailf === "")
    {
        //On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
        event.preventDefault();
        var html = '<div class="alert alert-danger" role="alert">Votre email doit être renseigné !</div>';
        $("#alertforgot").append(html);
    }
    else if (mailf_v.test(mailf) === false)
    {
        event.preventDefault();
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alertforgot").append(html);
    }

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

$('#button_forgot').click(function(event)
{
    // Appel de la fonction verif()
    verif();
});

//Vérification du nouveau mot de passe

function verif2()
{
// Récupère la valeur saisie dans le champ input

    var pass = $("#pass").val();
    var pass_v = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;

// On teste si la valeur est bonne

    // MOT DE PASSE

    if(pass === "")
    {
        //On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
        event.preventDefault();
        var html = '<div class="alert alert-danger" role="alert">Votre nouveau mot de passe doit être renseigné !</div>';
        $("#alertmdp").append(html);
        return false;
    }
    else if (pass_v.test(pass) === false)
    {
        event.preventDefault();
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alertmdp").append(html);
        return false;
    }

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

$('#button_newmdp').click(function(event)
{
    // Appel de la fonction verif()
    verif2();
});