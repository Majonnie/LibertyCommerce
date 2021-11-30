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
                    <table>
                        <tr id ="columns">
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Supprimer</th>
                        </tr>
                        @foreach ($cart_items_sorted as $item)
                        @php $product = $products->where('id', $item->product_id)->first(); @endphp
                        <tr>
                            <th>{{$product->name}}</th>
                            <th>{{$product->price}} balles</th>
                            <th>{{$cart_items->where('product_id', $product->id)->count()}}</th>
                            <th>
                                <form action="/removeproduct" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input class="delete" type="submit" value="Supprimer">
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @if (!$cart_items->isEmpty())

                <div class="order">
                    <div class="total">
                        @php $session_info = session()->all(); @endphp
                        Total : {{$session_info['total']}} balles
                    </div>
                    @if (is_null(auth()->user()->shipping_address))
                    <form action="/order" method="get">
                        <input type="submit" value="Commander">
                    </form>
                    @else
                    <form action="/order" method="post">
                        @csrf
                        <input type="hidden" name="shipping_address" value="{{auth()->user()->shipping_address}}">
                        <input type="submit" value="Commander">
                    </form>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </body>
    <script type="text/javascript" src="css/cart.js"></script>

    @include('layout.footer')
    

</html>