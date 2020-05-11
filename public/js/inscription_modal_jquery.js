// Fonction pour les messages d'erreurs du formulaire de connexion

function verif() 
{     
// Récupère la valeur saisie dans le champ input      
     
     var mail = $("#mail").val();
     var mail_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;
     var mdp = $("#mdp").val();
     var mdp_v = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
     
// On teste si la valeur est bonne

     // EMAIL

     if (mail === "") 
     {            
        var html = '<div class="alert alert-danger" role="alert">Votre email doit être renseigné !</div>';
        $("#alert6").append(html); 
     }
     else if (mail_v.test(mail) == false)
     {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alert6").append(html);
     }
     else
     {
         var html = '<div class="alert alert-success" role="alert">Votre email est validé</div>';
         $("#alert6").append(html);
     }

      // PASSWORD

     if (mdp === "") 
     {            
        var html = '<div class="alert alert-danger" role="alert">Veuillez saisir votre mot de passe !</div>';
        $("#alert7").append(html); 
        return false;
     }
     else if (mdp_v.test(mdp) == false)
     {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alert7").append(html);
        return false;
     }
     else
     {
         var html = '<div class="alert alert-success" role="alert">Votre mot de passe est validé</div>';
         $("#alert7").append(html);
     }

    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();
}

     $("#bouton_envoi1").click(function(event) 
{
    /* 
    On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */         
    event.preventDefault();
 
    // Appel de la fonction verif()
    verif();             
});

// Fonction pour les messages d'erreurs du formulaire d'inscription

function verif2() 
{     
// Récupère la valeur saisie dans le champ input      
     
     var identifiant = $("#identifiant").val();
     var identifiant_v = /^[0-9a-zA-Zàâäéèêëïîôöùûüç!:_\-.?,\/#]+$/;
     var email = $("#email").val();
     var email_v = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,252}\.[a-z]{2,4}$/;
     var discord = $("#discord").val();
     var discord_v = /^\D+\#\d{4}$/
     var password = $("#password").val();
     var password_v = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
     var conf_password = $("#conf_password").val();
     
// On teste si la valeur est bonne

    // LOGIN

    if (identifiant === "") 
    {            
        var html = '<div class="alert alert-danger" role="alert">Veuillez créer un login !</div>';
        $("#alert1").append(html); 
    }
    else if (identifiant_v.test(identifiant) == false)
    {
        var html = '<div class="alert alert-warning" role="alert">Caractère(s) non autorisé(s) !</div>';
        $("#alert1").append(html);
    }
    else
    {
        var html = '<div class="alert alert-success" role="alert">Votre login est validé</div>';
        $("#alert1").append(html);
    }

     // EMAIL

     if (email === "") 
     {            
        var html = '<div class="alert alert-danger" role="alert">Votre email doit être renseigné !</div>';
        $("#alert2").append(html); 
     }
     else if (email_v.test(email) == false)
     {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alert2").append(html);
     }
     else
     {
         var html = '<div class="alert alert-success" role="alert">Votre email est validé</div>';
         $("#alert2").append(html);
     }

      // ID DISCORD

      if (discord === "") 
      {            
         var html = '<div class="alert alert-danger" role="alert">Veuillez créer un ID Discord !</div>';
         $("#alert3").append(html); 
      }
      else if (discord_v.test(discord) == false)
      {
         var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
         $("#alert3").append(html);
      }
      else
      {
          var html = '<div class="alert alert-success" role="alert">Votre ID Discord est validé</div>';
          $("#alert3").append(html);
      }

      // PASSWORD

     if (password === "") 
     {            
        var html = '<div class="alert alert-danger" role="alert">Veuillez créer un mot de passe !</div>';
        $("#alert4").append(html); 
     }
     else if (password_v.test(password) == false)
     {
        var html = '<div class="alert alert-warning" role="alert">Format non valide !</div>';
        $("#alert4").append(html);
     }
     else
     {
         var html = '<div class="alert alert-success" role="alert">Votre mot de passe est validé</div>';
         $("#alert4").append(html);
     }

     // CONFIRMATION PASSWORD

     if (conf_password === "") 
     {            
        var html = '<div class="alert alert-danger" role="alert">Veuillez confirmer votre mot de passe !</div>';
        $("#alert5").append(html);
        return false;
     }
     else if (conf_password !== password)
     {
        var html = '<div class="alert alert-warning" role="alert">Les deux mots de passe sont différents !</div>';
        $("#alert5").append(html);
        return false;
     }
     else
     {
         var html = '<div class="alert alert-success" role="alert">Votre confirmation de mot de passe est validée</div>';
         $("#alert5").append(html);
     }


    // Si aucun test n'a renvoyé faux, c'est qu'il n'y a pas d'erreur, le script arrive ici, le formulaire est envoyé via submit()
    document.forms[1].submit();
}

     $("#bouton_envoi2").click(function(event) 
{
    /* 
    On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire avec l'instruction preventDefault(). Le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */         
    event.preventDefault();
 
    // Appel de la fonction verif()
    verif2();             
});