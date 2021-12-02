function addToCart(id, name, price) {
    var cart = getCart();
    var productId = id;
    var productName = name;
    var productPrice = price;
    var productQuantity = document.getElementById('product_quantity').value;
    if (document.URL.includes('product')) {
        var productMaxQuantity = document.getElementById('product_max_quantity').value;
    }
    if (productQuantity > productMaxQuantity) {
        document.querySelector('.quantity').style.color = "red";
        return;
    }
    var newProduct = {name:productName, price:productPrice, id:productId, qty:productQuantity};

    var hasProduct = false;
    cart.forEach(product => {
        if (product.id == productId) {
            const productIndex = cart.findIndex(product => product.id == productId)
            cart[productIndex].qty = parseInt(product.qty) + parseInt(productQuantity);
            sessionStorage.setItem('cart', JSON.stringify(cart));
            hasProduct = true;
        }
    });
    if (hasProduct == false) {
        cart.push(newProduct);
        sessionStorage.setItem('cart', JSON.stringify(cart));
    }
    window.location.href = "/cart"
}

function removeFromCart(id) {
    var cart = getCart();
    const productIndex = cart.findIndex(product => product.id == id)
    cart.splice(productIndex, 1);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    location.reload();
}

function loginView() {
    window.location.href = "/login";
}

function createCart() {
    var cart = getCart();
    var table = document.getElementById("cart_table");
    var total = 0;
    cart.forEach(product => {
        total += product.price*product.qty;
        var newLine = table.insertRow();
        var newCell = newLine.insertCell(0);
        newCell.appendChild(document.createTextNode(product.name))
        var newCell = newLine.insertCell(1);
        newCell.appendChild(document.createTextNode((parseFloat(product.price)*parseInt(product.qty)).toFixed(2)))
        var newCell = newLine.insertCell(2);
        newCell.appendChild(document.createTextNode(product.qty))
        var newCell = newLine.insertCell(3);
        var form = document.createElement("form");
        form.setAttribute("onsubmit", "return false");
        var input = document.createElement("input");
        input.setAttribute("onclick", "removeFromCart("+product.id+")");
        input.setAttribute("type", "submit");
        input.setAttribute("value", "Supprimer");
        input.className = "delete";
        form.appendChild(input);
        newCell.appendChild(form);
    })
    document.querySelector('.total').innerHTML = "Total : "+total.toFixed(2)+" balles"
}

function deleteCart() {
    var cart = getCart();
    for (var i = 0; i < cart.length; i++) {
        document.getElementById("cart_table").deleteRow(1)
    }
}

function createOrderButton() {
    const orderButton = document.createElement("input");
    orderButton.setAttribute("type", "submit");
    orderButton.setAttribute("value", "Commander");
    orderButton.setAttribute("onclick", "order()");
    orderButton.id = "order_button";
    document.querySelector(".orderform").appendChild(orderButton);
}

if ( document.URL.includes("cart") ) {
    createCart();
    if (getCart().length != 0) {
        createOrderButton();
    }
}

function getCart() {
    if (JSON.parse(sessionStorage.getItem("cart")) == null) {
        var cart = [];
    } else {
        var cart = JSON.parse(sessionStorage.getItem("cart"))
    }
    return cart;
}

function countItems() {
    var cart = getCart();
    var count = 0;
    cart.forEach(product => {
        for (var i = 0; i<product.qty; i++) {
            count++;
        }
    })
    document.querySelector('.cart_count').innerHTML = count+" | Panier"
}

function order() {
    var cart = getCart();
    var shipping_address = document.getElementById('shipping_address').value;
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    type: "POST",
    url: "order",
    data: {
        data: JSON.stringify(cart),
        address: shipping_address,
    },
    success:(resp)=>{
        console.log(resp);
    },
    error:(resp)=>{
        console.log(resp);
    }
    });
    if (document.URL.includes('order')) {
        var url = 'cart';
        var hash = '#refresh';
        window.location.href = url+hash;
    } else {
        refresh();
    }
}

if (window.location.hash === '#refresh') {
    refresh();
}

function refresh() {
    deleteCart();
    document.getElementById('order_button').remove();
    cart = [];
    sessionStorage.setItem('cart', JSON.stringify(cart));
    createCart();
    document.querySelector(".success_msg").innerHTML = "Nous prenons en compte votre commande, elle vous sera livrée dans les plus brefs délais (Même si vous n'avez pas payé...)";    
}


countItems();