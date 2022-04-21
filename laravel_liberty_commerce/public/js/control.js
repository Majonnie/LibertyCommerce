document.getElementById('refresh').addEventListener("click", getInfo);

function getInfo() {
    activeUser();
    orderNumber();
    biggestOrder();
}



function activeUser() {
        $.ajax({
        type: "GET",
        url: "usernumber",
        success:(resp)=>{
            document.querySelector('#usernumber').innerHTML= resp;
        },
        error:(resp)=>{
            console.log(resp)
        }
        });
}

function orderNumber() {
        $.ajax({
        type: "GET",
        url: "ordernumber",
        success:(resp)=>{
            document.querySelector('#ordernumber').innerHTML= resp;
        },
        error:(resp)=>{
            console.log(resp)
        }
        });
}

function biggestOrder() {
        $.ajax({
        type: "GET",
        url: "biggestorder",
        success:(resp)=>{
            console.log(resp)
            document.querySelector('#biggestorder').innerHTML= 
            "Commande passée le "+resp[0].created_at+" par "+resp[1].last_name+" "+resp[1].first_name+", livrée à "+resp[0].shipping_address;
        },
        error:(resp)=>{
            console.log(resp)
        }
        });
}


// httpRequest = new ActiveXObject("Microsoft.XMLHTTP");

// httpRequest.onreadystatechange = function() {
//     alert("bonjour");
// };

// httpRequest.open('GET', 'http://www.example.org/some.file', true);
// httpRequest.send();