// Fonction pour les messages d'erreurs du mot de passe oublié

function verif3() 
{     
// Récupère la valeur saisie dans le champ input      
     
     var mail = $("#email").val();
     var mail_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;
     
// On teste si la valeur est bonne

     // EMAIL

     if (mail === "") 
     {  
     /* 
    On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */   
        event.preventDefault();        
        var html = '<div class="alert alert-danger" role="alert">Votre email doit être renseigné !</div>';
        $("#alert8").append(html);
     }
     else if (mail_v.test(mail) == false)
     {
        event.preventDefault();
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alert8").append(html);
     }
    

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

     $("#bouton_envoi3").click(function(event) 
{
            
    // Appel de la fonction verif()
    verif3();             
});