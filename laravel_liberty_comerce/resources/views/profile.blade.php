<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Profil {{auth()->user()->first_name}}</title>
        <link rel="icon" type="image/gif/png" href="../images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/profil.css">
    </head>

    @include('layout.header')

    <body>
        <div class="main_wrapper">
            <div class="user">    
                <div class="top">
                    <div class="profile_picture">
                        @if (file_exists('storage/avatars/'.auth()->user()->id))
                        <img src="{{asset('storage/avatars/'.auth()->user()->id)}}" alt="profile_picture">
                        @else
                        <img src="{{asset('storage/avatars/default.png')}}" alt="profile_picture">
                        @endif
                    </div>
                    <div class="user_info">
                        <div>
                            <p>{{auth()->user()->first_name}}
                            {{auth()->user()->last_name}}</p>
                        </div>
                        <div>
                            <p>{{auth()->user()->email}}</p>
                        </div>
                        <div>
                            @if (!is_null(auth()->user()->shipping_address))
                            <p>{{auth()->user()->shipping_address}}</p>
                            @else
                            <p>Modifier votre profil pour ajouter une adresse de livraison par défaut.</p>
                            @endif
                        </div>
                        <div>
                            @if (auth()->user()->right_id == 2)
                            <p>Admin</p>
                            @else
                            <p>Non-admin</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="middle">
                    <h3>À propos de moi :</h3>
                    <div class="description">
                        <p class="desc">{{auth()->user()->description}}</p>
                    </div>
                </div>
                <div class="bottom">
                    <h3>Historique des commandes :</h3>
                    <div class="orders_list">
                        @foreach ($orders as $order)
                        <div class="order">
                            @php
                            $order_items = DB::table('orders_has_products')->where('order_id', $order->id)->get();
                            $order_items_sorted = DB::table('orders_has_products')->where('order_id', $order->id)->distinct()->get();
                            @endphp
                            <h3 lass="date_address">Date : {{ date('d F Y', strtotime($order->created_at))}}<br>Adresse : {{$order->shipping_address}}</h3>
                            <table>
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                </tr>
                                @foreach ($order_items_sorted as $item)
                                @php $product = $products->where('id', $item->product_id)->first(); @endphp
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$order_items->where('product_id', $product->id)->count()}}</td>
                                </tr>
                                @endforeach
                        </table>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="button">
                    <a href="{{url('profile_edit')}}" class="edit_button">Modifier</a> 
                </div>
            </div>
        </div>
    </body>

    @include('layout.footer')

</html>