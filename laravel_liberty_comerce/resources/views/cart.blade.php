<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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
                @if (session('success')) <h4 class="cart">{{session('success')}}</h4> @endif
                <div class="table_container">
                    <table id="cart_table">
                        <tr id ="columns">
                            <th>Produit</th>
                            <th>Prix</th>
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
                    <form class="orderform" action="/order" method="post">
                        @csrf
                        <input type="hidden" id="shipping_address" value="{{auth()->user()->shipping_address}}">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../js/cart.js"></script>

    @include('layout.footer')
    

</html>