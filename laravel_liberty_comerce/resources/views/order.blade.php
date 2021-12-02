<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Order</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div id="center_div">
                <h3 id="title">ORDER</h3> 
                @if ($errors->any()) <h4 class="error">{{$errors->first()}}</h4> @endif
                <form id="form" onsubmit="return false">
                    <div class="label_input">
                        <label class ="label" for="shipping_address">Adresse de livraison <br><i>exemple : 1 rue de what2eat 75000 Paris</i></label>
                        <input class="input" type="text" id="shipping_address">
                    </div>
                    <button onclick="order()" id="button" value="order">Commander</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')
</html>