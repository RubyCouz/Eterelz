// récupération des éléments
let plus = document.getElementsByClassName('plus');
let minus = document.getElementsByClassName('minus');
let qty = document.getElementsByClassName('qty');

// récupération de la valeur dans l'input
let inputQty = document.getElementsByClassName('inputQty').value;

// évènement
plus.onclick = cartupdateplus;
minus.onclick = cartupdatemoins;

/*
 action déclencher lors des events
 */
// incrémentation qté article
function cartupdateplus(){
    let qtyValor = parseInt(inputQty);
    qtyValor += 1; // qtyValor ++

    qty.innerHTML = qtyValor;

}

// décrémentation article
function cartupdatemoins(){
    let qtyValor = parseInt(inputQty);
    qtyValor -= 1; // qtyValor--

    qty.innerHTML = qtyValor;

}