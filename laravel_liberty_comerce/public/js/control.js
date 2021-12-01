function testAjax() {
    $(document).on('click', '#refresh', function(event) {
        event.preventDefaut();

        // var plateforme
        var test = "test";

        $.ajax({
            url : "/test",
            data : {
                test
            },
            method : "POST",
            success : function(data) {
                console.log(data);
            }
        })
    })
}


// httpRequest = new ActiveXObject("Microsoft.XMLHTTP");

// httpRequest.onreadystatechange = function() {
//     alert("bonjour");
// };

// httpRequest.open('GET', 'http://www.example.org/some.file', true);
// httpRequest.send();