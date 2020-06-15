// récupération des éléments
let plus = document.querySelector('.plus');
let minus = document.querySelector('.minus');
let qty = document.querySelector('.qty');
let subtotal = document.querySelector('.subtotal');
//let priceunit = document.querySelector('.priceUnit')

// récupération de la valeur dans l'input
let inputQty = document.querySelector('.inputQty').value;
let inputSubtotal =  document.querySelector('.inputSubtotal').value;
let inputPrice = document.querySelector('.inputPrice').value;

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
    if(qtyValor > 0){
        let priceValor = parseFloat(inputPrice);
        inputSubtotal = parseFloat(priceValor) * parseFloat(qtyValor);
        //console.log(inputSubtotal.toFixed(2));
        subtotal.innerHTML = inputSubtotal+" &euro;";
    }
}

// décrémentation article
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
        else if(qtyValor > 0){
            let priceValor = parseFloat(inputPrice);
            inputSubtotal = parseFloat(priceValor) * parseFloat(qtyValor);
            subtotal.innerHTML = inputSubtotal+" &euro;";
        }
}

plus.addEventListener('click', cartupdateplus);
minus.addEventListener('click', cartupdatemoins);