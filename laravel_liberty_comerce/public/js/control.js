document.getElementById('refresh').addEventListener("click", getInfo);

function getInfo() {
    activeUser();
    orderCount();
    biggestOrder();
}



function activeUser() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
        type: "POST",
        url: "order",
        data: {
            data: 1,
        },
        success:(resp)=>{
            console.log(resp)
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