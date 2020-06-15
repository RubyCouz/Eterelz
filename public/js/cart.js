// Récupération des éléments
 let plus = document.querySelector('.plus');
console.log(document.querySelector('.plus'));

 let minus = document.querySelector('.minus');
 let qty = document.querySelector('.qty');

// Récupération de la valeur dans l'input
 let inputQty = document.querySelector('.inputQty').value;

/*
 Action déclenchée lors des events
 */
// Incrémentation qté article
function cartupdateplus(){
    let qtyValor = parseInt(inputQty);
    qtyValor += 1; // qtyValor ++
    inputQty = qtyValor;
    qty.innerHTML = qtyValor;
}

// Décrémentation article
function cartupdatemoins(){
    let qtyValor = parseInt(inputQty);
    qtyValor -= 1; // qtyValor--
    inputQty = qtyValor;
    qty.innerHTML = qtyValor;
    if(qtyValor < 0){
        inputQty = 0;
        qty.innerHTML = 0;
    }
    else if(qtyValor === 0){
       confirm('Voulez-vous supprimer le produit du panier');
    }
}

plus.addEventListener('click', cartupdateplus);
minus.addEventListener('click', cartupdatemoins);