<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Produit</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/produit.css">
        <link rel="stylesheet" href="../css/forms.css">

    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class=div_image>
                <img class="product_image" src="{{asset('storage/images/products/'.$product->image)}}" width=100% alt="{{$product->name}}">
            </div>
            <section class="product_info">
                <h2 class="product_name">
                    {{$product->name}}
                </h2>
                <p class="description">
                    {{$product->description}}
                </p>
                <div class="info_bottom">
                    <div class="left">
                        <p class="price">
                            {{$product->price}}€
                        </p>
                        <p class="category">
                            {{$product->category}}
                        </p>
                        <p class="stock">
                            Stock : @if ($product->stock != 0) {{$product->stock}} @else indisponible ! @endif
                        </p>
                    </div>
                    @if ($product->stock > 0)
                        <div class="right">
                            <form class="buy" onsubmit="return false" >
                                @csrf
                                @php $stock_max = $product->stock; @endphp
                                <div class="quantity">
                                    <label name="product_quantity">Quantité:</label>
                                    <input type="number" id="product_quantity" max="{{$stock_max}}" min=1 value=1>
                                </div>
                                <button @if (Auth::check()) onclick="addToCart({{$product->id}}, '{{$product->name}}', {{$product->price}})" @else onclick="loginView()" @endif value="submit" type="submit">ACHETER</button>
                            </form>
                        </div>
                    @endif
                </div>
            </section>
        </div>
        @if(Auth::check())
            @if (Auth::user()->right_id == 2)
            <div class="form_background">
                <div class="center_div modif_form">
                    <h3 class="title">MODIFICATION DU PRODUIT</h3> 
                    @if (session('success')) <h4 class="title">{{session('success')}}</h4> @endif
                    <form action="/modifyproduct" enctype="multipart/form-data" method="post" id="form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name ="id" value="{{$product->id}}">
                        <div class="label_input">
                            <label class ="label" for="name">Nouveau nom</label>
                            <input class="input" type="text" name="name" value="{{$product->name}}" placeholder="{{$product->name}}">
                        </div>  
                        <div class="label_input">
                            <label class ="label" for="image">Nouvelle image</label>
                            <input class="input" type="file" name="image">
                        </div>
                        <div class="label_input">
                            <label class="label" for="description">Nouvelle description</label>
                            <textarea class="input" rows="10" type="text" name="description" placeholder="{{$product->description}}">{{$product->description}}</textarea>
                        </div>
                        <div class="label_input">
                            <label class="label" for="price">Nouveau prix</label>
                            <input class="input" type="number" step="0.01" min="0.01" name="price" value="{{$product->price}}" placeholder="{{$product->price}}">
                        </div>
                        <div class="label_input">
                            <label class ="label" for="category">Nouvelle catégorie</label>
                            <select name="category">
                                <option value="France">France</option>
                                <option value="Espagne">Espagne</option>
                                <option value="Etats-Unis">Etats-Unis</option>
                                <option value="Japon">Japon</option>
                            </select>
                        </div>
                        <div class="label_input">
                            <label class="label" for="stock">Ajouter au stock</label>
                            <input class="input" type="number" step="1" name="stock" min="1">
                        </div>
                        <button id="button" type="submit" value="add_product">Modifier</button>
                        <button id="delete_button" type="submit" formaction="/deleteproduct" formmethod="POST" >Supprimer le produit</button>
                    </form>
                </div>
            </div>
            @endif
        @endif
    </body>
    <script type="text/javascript" src="../js/cart.js"></script>
    
    @include('layout.footer')
</html>