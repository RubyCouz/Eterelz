// récupération des éléments
 let plus = document.querySelector('.plus');
console.log(document.querySelector('.plus'));

 let minus = document.querySelector('.minus');
 let qty = document.querySelector('.qty');

// récupération de la valeur dans l'input
 let inputQty = document.querySelector('.inputQty').value;

// évènement

// plus.click = cartupdateplus;
// minus.onclick = cartupdatemoins;

/*
 action déclencher lors des events
 */
// incrémentation qté article
function cartupdateplus(){
    let qtyValor = parseInt(inputQty);
    qtyValor += 1; // qtyValor ++
    inputQty = qtyValor;
    qty.innerHTML = qtyValor;
console.log(qtyValor);
}

// décrémentation article
function cartupdatemoins(){
    let qtyValor = parseInt(inputQty);
    qtyValor -= 1; // qtyValor--
    inputQty = qtyValor;
    qty.innerHTML = qtyValor;

}

plus.addEventListener('click', cartupdateplus);
minus.addEventListener('click', cartupdatemoins);