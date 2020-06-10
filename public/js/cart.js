/*Essai JavaScript pour mettre à jour le prix selon quantité */


document.getElementById('plus').onclick =function() {cartupdateplus()};

function cartupdateplus(){
    var qty = parseInt(document.getElementById('qty').value);
    var qty1 = qty+1;
    document.getElementById('qty').value = qty1;

}

function cartupdatemoins(){
(document.getElementById('qty').value)--;
}
