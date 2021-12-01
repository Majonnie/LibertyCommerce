<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Panier</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/panier.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        
    </head>
    
    @include('layout.header')

    <body>
        <div class="background-color">
            <div class="main_wrapper">
                <h1 class="cart">Mon panier</h1>
                <h4 class="cart success_msg"></h4>
                <div class="table_container">
                    <table id="cart_table">
                        <tr id ="columns">
                            <th>Produit</th>
                            <th>Prix (balles)</th>
                            <th>Quantité</th>
                            <th>Supprimer</th>
                        </tr>
                    </table>
                </div>
                <div class="order">
                    <div class="total">
                    </div>
                    @if (is_null(auth()->user()->shipping_address))
                    <form class="orderform" action="/order" method="get">
                    </form>
                    @else
                    <form class="orderform" onsubmit="return false">
                        <input type="hidden" id="shipping_address" value="{{auth()->user()->shipping_address}}">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </body>

    @include('layout.footer')
    

</html>