function verif() 
{ 
    var lemailconn = $("#emailconn").val();
    var reg5 = /^[a-zA-Z0-9.-]+@[a-z0-9.-]{2,252}.[a-z]{2,4}$/;
    
        if (lemailconn === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Veuillez saisir votre login !"+"</div>";
                $("#alertemailconn").append(html);
            }

        else if (reg5.test(lemailconn) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertemailconn").append(html);
            }
            
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertemailconn").append(html);
            }

    var lemdpconn = $("#mdpconn").val();
    var reg6 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
    
        if (lemdpconn === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Veuillez saisir votre mot de passe !"+"</div>";
                $("#alertmdpconn").append(html);
                return false;
            }
        else if (reg6.test(lemdpconn) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertmdpconn").append(html);
                return false;
            }
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertmdpconn").append(html);
            }

    document.forms[0].submit();

}

$("#bouton_envoi_modalconn").click(function(event) 
{
    /* On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire - avec l'instruction preventDefault() 
    * le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */ 

    event.preventDefault();

    // Appel de la fonction verif()
    verif();             
}); 

function verif2() 
{ 
    var lesurnom = $("#surnom").val();
    var reg1 = /^[0-9a-zA-Zàâäéèêëïîôöùûüç!:_\-.?,\/#]+$/;
    
        if (lesurnom === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Veuillez créer un login !"+"</div>";
                $("#alertsurnom").append(html);
            }

        else if (reg1.test(lesurnom) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertsurnom").append(html);
            }
            
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertsurnom").append(html);
            }

    var lemail = $("#email").val();
    var reg2 = /^[a-zA-Z0-9.-]+@[a-z0-9.-]{2,252}.[a-z]{2,4}$/;
    
        if (lemail === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Vous n'avez pas renseigné votre email !"+"</div>";
                $("#alertemail").append(html);
            }
        else if (reg2.test(lemail) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertemail").append(html);
            }
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertemail").append(html);
            }

    var lediscord = $("#discord").val();
    var reg3 = /^\D+#\d{4}$/;
    
        if (lediscord === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Vous n'avez pas renseigné votre ID Discord !"+"</div>";
                $("#alertedisc").append(html);
            }
        else if (reg3.test(lediscord) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertedisc").append(html);
            }
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertedisc").append(html);
            }

    var lemdp = $("#mdp").val();
    var reg4 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
    
        if (lemdp === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Vous n'avez pas renseigné votre mot de passe !"+"</div>";
                $("#alertemdp").append(html);
            }
        else if (reg4.test(lemdp) == false) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Format incorrect !"+"</div>";
                $("#alertemdp").append(html);
            }
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alertemdp").append(html);
            }

    var leconfmdp = $("#confmdp").val();
    
        if (leconfmdp === "") 
            {            
                var html ="<div class='alert alert-danger'role='alert'>"+"Vous n'avez pas confirmé votre mot de passe !"+"</div>";
                $("#alerteconfmdp").append(html);
                return false;
            }
        else if (leconfmdp !== lemdp) 
            {
                var html ="<div class='alert alert-warning'role='alert'>"+"Vos mots de passe sont différents !"+"</div>";
                $("#alerteconfmdp").append(html);
                return false;
            }
        else
            {
                var html ="<div class='alert alert-success'role='alert'>"+"Ok !"+"</div>";
                $("#alerteconfmdp").append(html);
            }

    document.forms[1].submit();

}

$("#bouton_envoi_modal").click(function(event) 
{
    /* On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire - avec l'instruction preventDefault() 
    * le paramètre 'event' est un objet (nommé librement) représentant l'évènement
    */ 

    event.preventDefault();

    // Appel de la fonction verif()
    verif2();             
}); 
